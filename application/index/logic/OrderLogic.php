<?php

/**
 * Created by PhpStorm.
 * User: lilie
 * Date: 2017/8/14
 * Time: 10:56
 * 逻辑类
 */

namespace app\index\logic;
use think\Model;

class OrderLogic extends Model
{


    /*
     *
     * 处理搜索条件的转化，模糊查询，时间间隔等
     * @param $send array 查询数组
     *
     * @return array 处理过的查询数组
     * **/
    public function convertseararr($send){
        if ( !empty($send['netname'])){
            //域名不为空
            $send['netname'] = ['like','%'.$send['netname'].'%'];
        }

        if ( !empty($send['realname'])){
            //公司名称不为空
            $send['realname'] = ['like','%'.$send['realname'].'%'];
        }

        if ( !empty($send['wzconcactor'])){
            //对接人不为空
            $send['wzconcactor'] = ['like','%'.$send['wzconcactor'].'%'];
        }

        if ( !empty($send['shoper'])){
            //销售不为空
            $send['shoper'] = ['like','%'.$send['shoper'].'%'];
        }




        if ( !empty($send['beianym'])){
            //备案域名不为空
            $send['beianym'] = ['like','%'.$send['beianym'].'%'];
        }

        
        return $send;

    }

}