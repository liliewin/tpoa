<?php
/**
 * Created by PhpStorm.
 * User: lilie
 * Date: 2017/8/11
 * Time: 18:19
 * 订单控制器
 */

namespace app\index\controller;


use app\index\Model\Orderlx;
use app\index\Model\Renewal;
use app\index\validate\OrderValidate;
use think\Controller;
use app\index\Model\Order;
use think\Db;
use think\Validate;


class Ordermanage extends Base
{
    
    /*
     * 订单列表页
     * 
     * 
     * */
    public function orderlist(){
        
        $send = I();//条件，主要是分类的数据，外界订单，广州三六，深圳，域名订单的区分
        if (empty($send['titleid'])){
            $send['titleid'] = 3;
        }
        $ordermodel = new Order();
        $orderlxmodel = new Orderlx();//产品类型数据库
        $olxlist = $orderlxmodel->select();
        $orderlist = $ordermodel->getorderlist($send);//获得数据
//        echo $ordermodel->getLastSql();
       // $orderlist = Db::name('order')->order('id desc')->paginate(10);
        // 获取分页显示
        $page = $orderlist->render();
//            p($page);
//        p($orderlist);
        $this->assign('orderlist',$orderlist);
        $this->assign('olxlist',$olxlist);
        $this->assign('title','订单管理');
        $this->assign('send',$send);
        $this->assign('page', $page);

        $this->assign('titleid', $send['titleid']);


        if ($send['titleid'] == 4){
            return $this->fetch('Ordermanage/yumingolist');//域名订单的模板
        }else{
            return $this->fetch();//默认模板
        }
      
        
        
        
    }








    /*
     * 订单添加页
     *
     *
     * */

    public function addorder(){

        $orderlxmodel = new Orderlx();
        $olxlist = $orderlxmodel->select();

        $this->assign('titleid',0);
        $this->assign('olxlist',$olxlist);
        return $this->fetch();
    }


    /*
    * 订单添加操作
    *
    *
    * */

    public function doaddorder(){

        $send = I();
        $ordermodel = new Order();
        $maxwzn = $ordermodel->getMaxWangzhannum();
        $send['wangzhannum'] = ($maxwzn+1);
        $send['Addtime'] = date("Y-m-d H:i:s");
        if ($send['titleid'] == 3 ){
            $validate = new OrderValidate();//验证字段
            if (!$validate->check($send)) {
                $this->error($validate->getError());
            }else{
                $ordermodel->data($send);
                $ordermodel->save();
//          p( $ordermodel->wangzhannum);
                //return $ordermodel->wangzhannum;

                $this->success('添加成功',U('orderlist',[   'titleid'=>$send['titleid']   ]),'',2);
            }
        }else{
            //域名添加
            $validate = new Validate(  $rule = [
//                'mobannum'  =>  'require',//模板编号
                'shoper' =>  'require',//销售员名字

            ],

          $message  =   [
//                'mobannum.require' => '模板地址不可以为空',
                'shoper.require'     => '销售员名字不可以为空',
            ]
);//验证字段
            if (!$validate->check($send)) {
                $this->error($validate->getError());
            }else{
                $ordermodel->data($send);
                $ordermodel->save();
 

                $this->success('添加成功',U('orderlist',[   'titleid'=>$send['titleid']   ]),'',2);
            }
        }
       


//        $this->redirect('orderlist',[   'titleid'=>$send['titleid']   ]);


    }




    /*
     * 编辑页
     *
     * */
    public function editorder(){

        $send = I();
        $id = $send['id'] ;  //传过来的订单id
        $orderlxmodel = new Orderlx();//产品类型数据库
        $ordermodel = new Order();//订单数据库
        $renewal = new Renewal();

        $olxlist = $orderlxmodel->select();//产品类型
        $orderdata = $ordermodel->find($id);//订单数据
//        p($orderdata);
        $maxrenewalarr = $renewal->getTimesnumArr($id);//续费最大的一次的续费信息

        $this->assign('od',$orderdata);
        $this->assign('maxrenewalarr',$maxrenewalarr);
        $this->assign('titleid',$orderdata['titleid']);
        $this->assign('olxlist',$olxlist);
        if ($orderdata['titleid'] == 4){
            return $this->fetch('yumingeorder');
        }else{
            return $this->fetch();

        }
    }



    /*
     *
     * 修改操作
     *
     * */
    public function doeditorder(){
        $send = I();

        if ($send['titleid'] == 3){
            //网站
            $validate = new OrderValidate();//验证字段

        }else{
            //域名
            $validate = new Validate(
                [

                    'shoper' =>  'require',//销售员名字

                ],[

                    'shoper.require'     => '销售员名字不可以为空',
                ]

            );


        }


        if (!$validate->check($send)) {
            $this->error($validate->getError());
        }else{
            $ordermodel = new Order();//订单数据库
            if ($ordermodel->save($send,['id' => $send['id'] ]) !== false ){
                $this->success('更新成功',U('orderlist',[   'titleid'=>$send['titleid']   ]));
            }else{
                $this->error('更新失败');
            }
        }


    }


    /*
    *
    * 修改操作,无需验证
    *
    * */
    public function doeditorderajax(){
        $send = I();


            $ordermodel = new Order();//订单数据库
            if ($ordermodel->save($send,['id' => $send['id'] ]) !== false ){
                $this->success('更新成功');
            }else{
                $this->error('更新失败');
            }




    }


    /*
    *
    * 修改操作,无需验证
    *
    * */
    public function doeditorderpics(){
        $send = I();

        $ordermodel = new Order();//订单数据库
        if ($ordermodel->save($send,['id' => $send['id'] ]) !== false ){
            $this->success('更新成功');
        }else{
            $this->error('更新失败');
        }




    }
    
    
    /*
     * 一个删除
     * 
     * */
    public function dodel(){
        $send = I();

        $ordermodel = new Order();//订单数据库
        if ($ordermodel->where('id',$send['id'])->delete() !== false ){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }





        
    }



    /*
     * 批量删除
     *
     *
     * */
    public function dodispatchdel(){
        $send = I();
        $ordermodel = new Order();//订单数据库
        if ($ordermodel->where('id','in',$send['ids'])->delete() !== false ){
            $this->success('批量删除成功');
        }else{
            $this->error('批量删除失败');
        }
        
    }



 



    
    
    
    
    
    
    
    
    




}