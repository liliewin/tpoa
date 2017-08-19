<?php

/**
 * Created by PhpStorm.
 * User: lilie
 * Date: 2017/8/15
 * Time: 19:18
 */
namespace app\index\validate;
use think\Validate;

class OrderValidate extends Validate
{
    protected $rule = [
        'mobannum'  =>  'require',//模板编号
        'shoper' =>  'require',//销售员名字

    ];

    protected $message  =   [
        'mobannum.require' => '模板地址不可以为空',
        'shoper.require'     => '销售员名字不可以为空',
    ];





}