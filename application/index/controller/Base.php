<?php
namespace app\index\controller;

use think\Config;
use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {

        if (!session(config('ADMINLOGIN'))){
            //没有登录的话就跳到注册页面
            $this->redirect(url('/index.php/index/Login/index'));
        }
        
        
    }
}
