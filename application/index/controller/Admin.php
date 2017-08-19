<?php
namespace app\index\controller;

use think\Config;
use think\Controller;



class Admin extends Base
{


    protected $beforeActionList = [
        'first'
    ];



    /*
     * 前置方法
     *
     * */
    public function first(){
        if (empty($titleid)){
            $titleid = 0;
        }
        $this->assign('titleid',$titleid);
    }

    /*
     * 管理员列表
     *
     * */
    public function index()
    {

        
        $adminmodel = new \app\index\Model\Admin();
        $admins = $adminmodel->getAllAdmin();//所有的用户管理员
//         p($admins);
        $this->assign('admins',$admins);
        $this->assign('title',"管理员列表");
        return $this->fetch();
//       return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }



    /*
     * 修改管理员
     *
     * */
    public function editadmin(){


        $id = I('id');//管理员id
        $this->assign('id',$id);
        $this->assign('title','修改信息');
        return $this->fetch();
    }


    /*
     * 修改操作
     *
     * */
    public function doeditadmin(){

        $send = I();

        $id = $send['id'];
        if (trim($send['npassword']) === trim($send['qpassword'])){
            //密码确认密码和新密码一样才行
            $adminmodel = new \app\index\Model\Admin();
            $msg = $adminmodel->where('id',$id)->find();//管理员信息

            if ( $msg['password'] == get_password($send['ypassword'],$msg['encrypt']) ){
                //原密码一样才可以修改密码
                $data['id'] = $id;

                $data['password'] = get_password($send['npassword'],$msg['encrypt']);
            
                if ($adminmodel->isUpdate(true)->save($data) !== false){
                    $this->success("修改密码成功");
                }else{
                    $this->error('修改密码失败');
                }

            }else{

                $this->error('原密码不对');

            }

        }else{
            $this->error("密码确认密码和新密码不一样");
        }
        
        
        

    }




    /*
     *
     * 增加用户管理员
     *
     * */

    public function addadmin(){
        


        return $this->fetch();
    }


    /*
     *增加用户
     *
     * */
    public function doaddadmin(){
        $send = I();
        if (!empty($send)){
            if (trim($send['username']) != ''){
                if (trim($send['npassword']) != ''){
                    if (trim($send['npassword']) == trim($send['qpassword'])){
                        $adminmodel = new \app\index\Model\Admin();
                        $encrypt = get_randomstr();
                        $data = [
                            'username' => $send['username'],
                            'encrypt' => $encrypt,
                            'password' => get_password($send['npassword'],$encrypt)
                        ];//插入的数据
                        if ($adminmodel->save($data) !== false){
                            $this->success("增加成功");
                        }else{
                            $this->error("增加失败");
                        }
                    }else{
                        $this->error("确认密码与密码不相同");
                    }
                }else{
                    $this->error("密码不可为空");

                }
            }else{
                $this->error("用户名为空");
            }
        }else{
            $this->error("数据不可为空");
        }

    }




    /*
     *
     * 删除
     *
     * */
    public function dodel(){
        $send = I();
        $id = $send['id'];
        $adminmodel = new  \app\index\Model\Admin();
        if (!empty($adminmodel->where('id',$id)->find())){
            //不为空的话就删除
            if ($adminmodel->where('id',$id)->delete() !== false){
                 $this->success('删除成功');
            }else{
                $this->error("删除失败");
            }
        }else{
            $this->error("删除的数据不存在");
        }

    }
    
    
    
    
    
}
