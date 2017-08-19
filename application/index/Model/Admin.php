<?php
namespace app\index\Model;
/**
 * Created by PhpStorm.
 * User: lilie
 * Date: 2017/8/10
 * Time: 22:19
 * 用户表
 */
use think\Model;


class Admin extends Model
{

    /*
     * 获得
     * @param $id 用户id
     * @return encrypt string 加密的数据
     * */
    public function getEncrypt($id){
        $user = self::get($id);//抽取一条数据
        return $user->getAttr('encrypt');

    }
    
    
    /*
     * 
     * 获得所有的管理员
     * 
     * */
    public function getAllAdmin(){
        
        return $this->field('password,encrypt',true)->select();
    }

    




}