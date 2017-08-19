<?php
namespace app\index\controller;

use app\index\Model\Admin;
use think\Config;
use think\Controller;
use think\Db;

class Login extends Controller
{


    /*
     * 登录页面
     *
     * */
    public function index()
    {



        return $this->fetch();
//       return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }



    /*
     *
     *登录操作
     *
     *
     * */
    public function login(){
        $send = I();
        $adminmodel = new Admin();
        $user  = Admin::getByUsername($send['username']);//获得用户名的数据对象
        if( $user == null ){
            $this->error("用户不存在");
        }else{
            if ( $user->password === get_password( $send['password'], $user->encrypt )){

               $res =   $adminmodel->save([
                    'lastloginIip'=>  request()->ip(),
                    'lastlogintime' => date('Y-m-d H:i:s'),
                    'logintimes' => ($user->logintimes + 1)
                ],['id' => $user-> id ])  ;

                if ($res !== false){
                    //验证密码，通过之后
                    session(C('ADMINLOGIN'),true);//表明已经登录
                    session(C('ADMINNAME'),$send['username']);//表明已经登录
                    $this->redirect("Index/index");
                }else{
                    $this->error("登录失败");
                }



            }else{
                $this->error("用户密码不对");
            }
        }
    }


    /*
     * 退出登录
     *
     * */
    public function logout(){
        session(C('ADMINLOGIN'),null);//表明已经登录
        session(C('ADMINNAME'),null);//表明已经登录
        $this->redirect('Login/index');
    }



}
