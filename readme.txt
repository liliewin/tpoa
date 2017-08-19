<?php
namespace app\index\controller;

class Index extends base
{
    public function index()
    {
        header("Content-Type: text/html; charset=utf-8");
        $size = input('size');

        if($size==""){

            \think\Url::root('index.php/');
        }

        $num = 20;
        if(!$size){
            $size = 1;
        }
//        echo $size;

       $url = "https://www.edns.com/API/API2.asp?action=DownloadData";
       $url2 ="domainname.html";//假设是网上的
       $url3 ="domainname2.html";//本地
       $username = "liliewin";
       $password = "x87asfdsO1q";
       $domainname = '';
       $otime = time();
       $chksum = md5($username.$domainname.$otime.md5($password));

       $data = array
       (
           'username' => urlencode($username),
           'password' => urlencode($password),
           'otime'  => urlencode($otime),
           'chksum' => urlencode($chksum),


       );
        $f1 = 'domainname_loading.html';//本地比较文件
        $f2 = 'domainname2.html';
        $result = $this->Post($url, $data);
        $this->fwrite_domainname($result,'domainname_loading.html');  //把数值写入文本
        $compare_r = $this->compare_str($f1,$f2);
        if (!$compare_r){

            $this->fwrite_domainname($result,$f2);  //把数值写入文本
        }
        //print_r($compare_r);die();
        $content = file_get_contents($f2);
        $result2 = $this->mb_convert_tran(strip_tags($content));  //去掉html并且转换成utf-8编码

        //print_r($result2);
        $result_array = explode("\n",$result2);
        $total = count($result_array)-2;  //总数
        $pagesize= ceil($total/$num);  //总页码
        $mod_num = $total%$num;//余数
//        var_dump($mod_num);
        $list = $this->Get_page_array($num,$size,$result_array,$mod_num,$pagesize); //获取第N页的数组
        foreach ($list as $k => &$v){
            $v_arr[$k] = explode(",",$v);
            $list[$k] = $v_arr[$k];

        };

        $list2 = $list;
        foreach ($list2 as $k => &$v){
            $v[1] = $v[1]+5;
            //unset($v[5]);
            unset($v[6]);

            foreach ($v as $k => $value){
                $v[$k] = $this->DeleteHtml($v[$k]);//去掉空白行，空格
            }

            if ($v[8]==0){
                $v[8] = "万网";
            }elseif($v[8]==1){
                $v[8] = "非万网";
            }elseif($v[8]==ja){
                $v[8] = "景安";
            }

            if ($v[10]=='h'){
                $v[10] = "微名黑名单";
            }else{
                $v[10] = "正常";
            }
            $v[5] = $v[1];
            unset($v[1]);
        }

        $page_first = $size;
        $page_last = ($size+3)>$pagesize?$pagesize:($size+3);
        $pre_page = $size-1;
        $next_page = $size+11;
//        print_r($total);
//        print_r($mod_num);
//        print_r($list);die();


        //分页
        $str = "<ul class='pagination'><li ><a  >总数 ：$total</a></li><li ><a  >第 $size 页/共 $pagesize 页</a></li><li ><a href='".url('index/index/index','size=1')."'>首页</a></li><li ><a href='".url('index/index/index','size='.$pre_page)."'>&laquo;</a></li>";
        for($x = $page_first;$x <= $page_last; $x++){
            $str .= "<li><a href='".url("index/index/index","size="."$x")."'>  $x </a></li>";
        };
        $str = $str . "<li ><a href='".url('index/index/index','size='.$next_page)."'>&raquo;</a></li><li ><a href='".url('index/index/index','size='.$pagesize)."'>尾页</a></li><li > 第<input  name='size' value='$size' style='width:30px;height: 32px;' />页<a href='".url('index/index/index','size='.$size)."'>跳转</a></li></ul>";


        $this->assign('list', $list2);
        $this->assign('total', $total);
        $this->assign('pagesize', $pagesize);
        $this->assign('pages', $str);



         return $this->fetch();

    }




    /*获取第N页的数据
     * parm $num 每页数量
     * parm $size 第几页
     * parm $result_array 要处理数据
     * parm $mod_num 最后一页的数量
     * parm $pagesize 总页码
     * */
    public function Get_page_array($num,$size,$result_array = array(),$mod_num,$pagesize)
    {


        if ($size >= $pagesize ){
            $list_array = array_slice($result_array,1+($size-1)*$num,$mod_num);//获取第N页的总数
        }else{
            $list_array = array_slice($result_array,1+($size-1)*$num,$num);//获取第N页的总数
        }


        //$list_array2 = $this->array_iconv('gbk','utf-8',$list_array);//将gbk的转换成utf-8
        return $list_array;
    }


    /*提交参数到地址接收返回值
     * parm $url  地址
     * parm $data 参数，数组
     *
     * */
    public function Post($url, $data = null)
    {

        $context = array();
        if (is_array($data))
        {
            ksort($data);
            $context['http'] = array
            (
                //'timeout'=>60,
                'header' => "Content-type: application/x-www-form-urlencoded ",
                'method' => 'POST',
                'content' => http_build_query($data),
            );
        }

        $result = file_get_contents($url, false, stream_context_create($context));
        return $result;
    }

    /*数组编码转换
     * parm $in_charset 原来的编码
     * parm $out_charset  要转换成的编码
     * parm $arr    数组
     * */
    public function array_iconv($in_charset,$out_charset,$arr){
        return eval('return '.iconv($in_charset,$out_charset,var_export($arr,true).';'));
    }

/*把数值写入文本
 * */
    public function fwrite_domainname($data,$name){
        $myfile = fopen($name, "w") or die("Unable to open file!");
        fwrite($myfile, $data);
        fclose($myfile);
    }

   /*字符串编码转换
    * */
    public function mb_convert_tran($str){
        $encode = mb_detect_encoding($str, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));//获取当前字符串的编码
        $str_encode = mb_convert_encoding($str, 'UTF-8', $encode);//将字符编码改为utf-8
        return $str_encode;
    }

/*去掉多余的空行
 * */
    public function DeleteHtml($str){
        $str2 = preg_replace("/(\r\n|\n|\r|\t)/i", '', $str);
        return trim($str2);
    }

/*遍历比较文件，有不同就跳出循环
 * */
    public function compare_str($f1,$f2){
        $compare_r = "1";
        $file1 = file_get_contents($f1);
        $file2 = file_get_contents($f2);
        $arr1 = preg_split("/\n/",$file1);
        $arr2 = preg_split("/\n/",$file2);
        foreach($arr1 as $index => $v)
        {
            if($v != $arr2[$index])
            {
                $compare_r = "0";
                break;
            }
        }
        return $compare_r;
    }
}
