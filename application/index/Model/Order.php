<?php
/**
 * Created by PhpStorm.
 * User: lilie
 * Date: 2017/8/11
 * Time: 18:28
 * 订单类，控制数据库
 */

namespace app\index\Model;

use app\index\logic\OrderLogic;
use think\Model;

class Order extends Model
{
    
    
    /*
     * 获得数据列表
     * @param $send 传过来的条件
     * */
    public function getorderlist($send = array()){

//        $orderlist = $this->where(array_filter($send))->order('id desc')->limit(0,10)->select();
        if (!empty($send['page'])){
            $send['page'] = null;
        }
        $orderlogic = new OrderLogic();
//        p($send);
        $send = $orderlogic->convertseararr($send);

        $orderlist = self::where(array_filter($send))->order('id desc')->paginate(10);
       /* if ($orderlist){
            $orderlist = collection($orderlist)->toArray();
        }*/
        return $orderlist;
    }



    /*
     *
     *  获得最大的的模板的编号
     *
     * */

    public function getMaxWangzhannum(){
        return $this->max('wangzhannum');
    }



}