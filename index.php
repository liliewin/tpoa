<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
 
// 定义应用目录
define('APP_PATH',  './application/');
// 加载框架引导文件
define('APP_NAME',  'application/');

define('__ROOT__',  '/'.'');//根目录

define('__UPLOAD__', dirname(__FILE__).'/upload/');//上传目录的常量

require  './thinkphp/start.php';
