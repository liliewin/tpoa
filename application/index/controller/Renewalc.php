<?php
/**
 * Created by PhpStorm.
 * User: lilie
 * Date: 2017/8/19
 * Time: 10:27
 */

namespace app\index\controller;


use app\index\Model\Renewal;
use think\Controller;

class Renewalc extends Controller
{
  /*
   * 续费详细情况
   *
   * */
    public function detail(){
        $send = I();
        $oid = $send['oid'];
        $renewalmodel = new Renewal();
        $renewalmsg = $renewalmodel->getAllMsgByOid($oid);//获得续费的历史信息
        $this->assign('renewalmsg',$renewalmsg);
        $this->assign('title','续费历史');
        return  $this->fetch();
    }


}