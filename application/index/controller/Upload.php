<?php
/**
 * Created by PhpStorm.
 * User: lilie
 * Date: 2017/8/16
 * Time: 11:23
 */

namespace app\index\controller;


use app\index\Model\Order;
use think\Controller;
use think\Db;

class Upload extends Controller{



    /*
     * 备注列表页面
     *
     * */
    public function note(){
        $send = I();
//        p(time()) ;
        $upload = new \app\index\Model\Upload();
        $uplist = $upload->where('oid',$send['id'])->order('uploadtime desc')->select();//搜索列表出来
//        p($send['id']);
        $this->assign('oid',$send['id']);//订单id
        $this->assign('uplist',$uplist);
        $this->assign('title','备注列表');
        return $this->fetch();
    }



    /*
     *
     * 添加
     *
     * */
    public function add(){
        $send = I();
        $this->assign('oid',$send['oid']);//订单id
        $this->assign('title','增加备注');
        return $this->fetch();
    }



    /*
     * ajax 上传操作
     * 备注
     * */
    public function upldoc(){
        $oid = I('oid');//订单号
        $order = Db::table('order')->where('id',$oid)->find();
        $wangzhannum = $order['wangzhannum'];//模板编号
        $msg = [];
        $resjson = [];
        $name = iconv('utf-8','gb2312',$_FILES["file"]["name"]); //利用Iconv函数对文件名进行重新编码
        if ($_FILES["file"]["size"] < 2000000)
        {
            if ($_FILES["file"]["error"] > 0)
            {
                array_push($msg,"Return Code: " . $_FILES["file"]["error"] . "<br />" );

            }
            else
            {
                array_push($msg,
                    "Upload: " . $_FILES["file"]["name"] . "<br />",
                    "Type: " . $_FILES["file"]["type"] . "<br />",
                    "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />",
                    "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />"
                );


                if (file_exists(__UPLOAD__ .date('Ymd').'/'. $name))
                {
                    array_push($msg,$_FILES["file"]["name"] . " already exists. ");

                }
                else
                {
                    $this->mkdirs(__UPLOAD__  .date('Ymd'));//不存在就创建
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        __UPLOAD__  .date('Ymd').'/'.$wangzhannum.'_'. time().$name   );
                    array_push($msg,"Stored in: " . __UPLOAD__  .date('Ymd').'/'. $_FILES["file"]["name"]);
                    $msg['path'] = '/upload/'.date('Ymd').'/'.$wangzhannum.'_'. time().$_FILES["file"]["name"];
                 //   echo "Stored in: " . __UPLOAD__ . $_FILES["file"]["name"];
                    $resjson['status'] = 1;
                }
            }
        }
        else
        {
            array_push($msg,"Invalid file" );

        }


        array_push($resjson, $msg);
        return $resjson;

    }




    /*
     *
     * 把备注文件信息保存到数据库
     *
     * */

    public function doadd(){
        $send = I();
        $uploadmodel = new \app\index\Model\Upload();
        $data = [
            'uploadtime'  => time(),
            'documentpath' => $send['documentpath'],
            'note' => $send['note'],
            'oid' => $send['oid']
        ];
        if ($uploadmodel->save($data) !== false){
            $this->success('添加成功',url("note",['id'=>$send['oid']]));
        }
    }
    
    
    
    /*
     * 删除,注意文件名称的中文编码
     * 
     * */
    public function dodel(){
        $id = I('id');//备注主键
        $note = Db::table('Upload')->where('id',$id)->find();
        //p(substr(ROOT_PATH,0,strlen(ROOT_PATH)-1 ).$note['documentpath']);
            $dpath =  str_replace('\\','/',substr(ROOT_PATH,0,strlen(ROOT_PATH)-1 ).$note['documentpath']);//
             $dpath=  iconv('utf-8','gb2312',$dpath); //利用Iconv函数对文件名进行重新编码
//        p($dpath);
        if (unlink($dpath)){
            //若成功，则返回 true，失败则返回 false。
            if ( Db::table('Upload')->where('id',$id)->delete() !== false){
                $this->success("删除成功");
            }else{
                $this->error("删除失败");
            }


        }else{
            $this->error("删除失败");
        }

    }



    /*
     * 添加图片页面
     *
     * */
    public function pics(){
        $send = I();
        $oid = $send['id'];
        $ordermodel = new Order();
        $order = $ordermodel->where('id',$oid)->find();//选择的订单
        $picspath = $order['picspath'];
        $this->assign('picspath',$picspath);
        $this->assign('title','添加图片');
        $this->assign('oid',$oid);
        return $this->fetch();
    }





    /*
     * 订单缩略图的上传
     *
     *
     * */





       public function uplorderimg(){
        
        if (empty(I('oid'))){
            //这里是增加订单的时候上传的
            $ordermodel = new Order();
            $maxwzn = $ordermodel->getMaxWangzhannum();
            $wangzhannum = $maxwzn +1;
        }else{
            //修改订单的时候上传的，搜索模板编号地址
            $oid = I('oid');//订单号
            $order = Db::table('order')->where('id',$oid)->find();
            $wangzhannum = $order['wangzhannum'];//模板编号
        }
        
        
        
        
        $msg = [];
        $resjson = [];
        $name = iconv('utf-8','gb2312',$_FILES["file"]["name"]); //利用Iconv函数对文件名进行重新编码
        if ($_FILES["file"]["size"] < 2000000)
        {
            if ($_FILES["file"]["error"] > 0)
            {
                array_push($msg,"Return Code: " . $_FILES["file"]["error"] . "<br />" );

            }
            else
            {
                array_push($msg,
                    "Upload: " . $_FILES["file"]["name"] . "<br />",
                    "Type: " . $_FILES["file"]["type"] . "<br />",
                    "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />",
                    "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />"
                );


                if (file_exists(__UPLOAD__ .date('Ymd').'/'. $name))
                {
                    array_push($msg,$_FILES["file"]["name"] . " already exists. ");

                }
                else
                {
                    $this->mkdirs(__UPLOAD__  .date('Ymd'));//不存在就创建
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        __UPLOAD__  .date('Ymd').'/'.$wangzhannum.'_pic_'. time().$name   );
                    array_push($msg,"Stored in: " . __UPLOAD__  .date('Ymd').'/'. $_FILES["file"]["name"]);
                    $msg['path'] = '/upload/'.date('Ymd').'/'.$wangzhannum.'_pic_'. time().$_FILES["file"]["name"];
                    //   echo "Stored in: " . __UPLOAD__ . $_FILES["file"]["name"];
                    $resjson['status'] = 1;
                }
            }
        }
        else
        {
            array_push($msg,"Invalid file" );

        }


        array_push($resjson, $msg);
        return $resjson;

    }










   /*
    *php判断文件夹是否存在不存在则创建
    *默认的 mode 是 0777，意味着最大可能的访问权。
    * @param $dir 文件名
    * @param $mode 默认的 mode 是 0777，意味着最大可能的访问权
    * */
    public function mkdirs($dir, $mode = 0777)
    {
        if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
        if (!$this->mkdirs(dirname($dir), $mode)) return FALSE;
        return @mkdir($dir, $mode);
    }






}