<?php
/**
 * Created by PhpStorm.
 * User: lilie
 * Date: 2017/8/18
 * Time: 18:42
 *
 * 续费表 的 model
 */

namespace app\index\Model;


use think\Model;

class Renewal extends Model
{



    /*
     *
     *获得续费的次数的那一次数据
     * @param $oid
     * */
    public function getTimesnumArr($oid){
         $maxtimesnum = $this->table('renewal')->where('oid',$oid)->max('timesnum');//最大的那一次续费
         $res =  $this->where('timesnum',$maxtimesnum)->find();//搜索出最近一次续费的信息
        return $res ;
    }



    /*
     * 通过oid 获得所有续费信息的
     * @param $oid
     * */
    public function getAllMsgByOid($oid){
        $res =  $this
            ->alias('r')
            ->join('order o ','r.oid = o.id','LEFT')
            ->where('oid',$oid)
            ->order('timesnum asc')
            ->select();
        return $res;

    }













}