<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    'ADMINLOGIN' => 'islogin', //是否登录
    'ADMINNAME' => 'username', // 用户名字


    'view_replace_str' => [
        /*'__PUBLIC__' => __ROOT__.ltrim(APP_NAME,'.'). 'index' . '/View/public', //home下的public
        '__P__' => __ROOT__.APP_NAME. '/Public', // 根目录下的Public*/

        '__PUBLIC__' => __ROOT__.'public',
        '__STATIC__' => __ROOT__.'public/static',
        '__INDEX__' => __ROOT__.'public/index',

    ]



];
