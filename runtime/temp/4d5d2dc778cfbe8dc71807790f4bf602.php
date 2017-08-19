<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:41:"./application/index/view/index_index.html";i:1503144775;s:43:"./application/index/view/public_script.html";i:1503144775;s:40:"./application/index/view/public_nav.html";i:1502438616;s:41:"./application/index/view/public_left.html";i:1502714364;}*/ ?>
 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <title>用户中心</title>
    <link href="__STATIC__/bootstrap-3.3.5-dist/css/bootstrap.min.css" title="" rel="stylesheet" />
    <link title="" href="__INDEX__/css/style.css" rel="stylesheet" type="text/css"  />
    <link title="blue" href="__INDEX__/css/dermadefault.css" rel="stylesheet" type="text/css"/>
    <link title="green" href="__INDEX__/css/dermagreen.css" rel="stylesheet" type="text/css" disabled="disabled"/>
    <link title="orange" href="__INDEX__/css/dermaorange.css" rel="stylesheet" type="text/css" disabled="disabled"/>
    <link href="__INDEX__/css/templatecss.css" rel="stylesheet" title="" type="text/css" />
    <link href="__STATIC__/layer/skin/default/layer.css" rel="stylesheet" title="" type="text/css" />
    <script src="__INDEX__/script/jquery.js" type="text/javascript"></script>
    <script src="__INDEX__/script/jquery.cookie.js" type="text/javascript"></script>
    <script src="__STATIC__/bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript"></script  >
    <script src="__STATIC__/layer/layer.js" type="text/javascript"></script>

    <script src="__INDEX__/script/index.js" type="text/javascript"></script>


    <!--angular ui--->
    <link rel="stylesheet" title="" type="text/css" href="__INDEX__/ui-layout-0.0.0/ui-layout.css"/>
    <script src="__INDEX__/script/angular.min.js"></script>
    <script src="__INDEX__/ui-layout-0.0.0/ui-layout.js"></script>

    <LINK href="favicon.ico" type="image/x-icon" rel=icon>


</head>





<body>



<nav class="nav navbar-default navbar-mystyle navbar-fixed-top">
    <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand mystyle-brand"><span class="glyphicon glyphicon-home"></span></a> </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="li-border"><a class="mystyle-color" href="#">管理控制台</a></li>

        </ul>

        <ul class="nav navbar-nav pull-right">
            <li class="li-border">
                <a href="#" class="mystyle-color">
                    <span class="glyphicon glyphicon-bell"></span>
                    <span class="topbar-num">0</span>
                </a>
            </li>


            <li class="dropdown li-border"><a href="#" class="dropdown-toggle mystyle-color" data-toggle="dropdown"><?php echo \think\Session::get('username'); ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo U('Login/logout'); ?>"  id="logout" dd="ddd"  >退出</a></li><!---->
                </ul>
            </li>

            <li class="dropdown"><a href="#" class="dropdown-toggle mystyle-color" data-toggle="dropdown">换肤<span class="caret"></span></a>
                <ul class="dropdown-menu changecolor">
                    <li id="blue"><a href="#">蓝色</a></li>
                    <li class="divider"></li>
                    <li id="green"><a href="#">绿色</a></li>
                    <li class="divider"></li>
                    <li id="orange"><a href="#">橙色</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>





<div class="down-main">



    <div class="left-main left-full">
    <div class="sidebar-fold"><span class="glyphicon glyphicon-menu-hamburger"></span></div>
    <div class="subNavBox">
        <div class="sBox">
            <div class="subNav sublist-down"><span class="title-icon glyphicon glyphicon-chevron-down"></span><span class="sublist-title">订单管理</span>
            </div>
            <ul class="navContent" style="display:block">
                <?php if(empty($titleid)): $titleid = '0'; endif; ?>

                <li    <?php if($titleid == 3): ?>class="active"  <?php endif; ?> >
                    <div class="showtitle" style="width:100px;"><img src="__INDEX__/img/leftimg.png" />外接订单</div>
                    <a href="<?php echo U('Ordermanage/orderlist' ,['titleid' => 3] ); ?>"><span class="sublist-icon glyphicon glyphicon-user"></span><span class="sub-title">外接订单</span></a>
                </li>

                <li <?php if($titleid == 2): ?>class="active"  <?php endif; ?> >
                    <div class="showtitle" style="width:100px;"><img src="__INDEX__/img/leftimg.png" />深圳力玛订单</div>
                    <a href="<?php echo U('Ordermanage/orderlist' ,['titleid' => 2] ); ?>"><span class="sublist-icon glyphicon glyphicon-envelope"></span><span class="sub-title">深圳力玛订单</span></a>
                </li>

                <li <?php if($titleid == 1): ?>class="active"  <?php endif; ?> >
                    <div class="showtitle" style="width:100px;"><img src="__INDEX__/img/leftimg.png" />广州叁六订单</div>
                    <a href="<?php echo U('Ordermanage/orderlist' ,['titleid' => 1] ); ?>"><span class="sublist-icon glyphicon glyphicon-bullhorn"></span><span class="sub-title">广州叁六订单</span></a>
                </li>

                <li <?php if($titleid == 4): ?>class="active"  <?php endif; ?> >
                    <div class="showtitle" style="width:100px;"><img src="__INDEX__/img/leftimg.png" />域名订单</div>
                    <a href="<?php echo U('Ordermanage/orderlist' ,['titleid' => 4] ); ?>"><span class="sublist-icon glyphicon glyphicon-credit-card"></span><span class="sub-title">域名订单</span></a>
                </li>
                <li >
                    <div class="showtitle" style="width:100px;"><img src="__INDEX__/img/leftimg.png" />添加订单</div>
                    <a href="<?php echo U('Ordermanage/addorder'); ?>"><span class="sublist-icon glyphicon glyphicon-credit-card"></span><span class="sub-title">添加订单</span></a>
                </li>
            </ul>
        </div>
        <div class="sBox">
            <div class="subNav sublist-up"><span class="title-icon glyphicon glyphicon-chevron-up"></span><span class="sublist-title">账号管理</span></div>
            <ul class="navContent" style="display:none">
                <li class="active">
                    <div class="showtitle" style="width:100px;"><img src="__INDEX__/img/leftimg.png" />账号管理</div>
                    <a href="<?php echo U('Admin/index'); ?>"><span class="sublist-icon glyphicon glyphicon-user"></span><span class="sub-title">账号管理</span></a> </li>

            </ul>
        </div>
    </div>
</div>




    <div class="right-product my-index right-full">
        <div class="container-fluid">
            <div class="info-center">

                <!---title----->
                <div class="info-title">
                    <div class="pull-left">
                        <h4><strong><?php echo \think\Session::get('username'); ?></strong></h4>
                        <p>欢迎登录管理系统！  </p>
                    </div>
                    <div class="time-title pull-right">
                        <div class="year-month pull-left">
                            <p>星期二</p>
                            <p><span>2016</span>年8月23日</p>
                        </div>
                        <div class="hour-minute pull-right">
                            <strong>9:00</strong>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!----content-list---->
                <div class="content-list">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="content">
                                <div class="w30 left-icon pull-left">
                                    <span class="glyphicon glyphicon-file blue"></span>
                                </div>
                                <div class="w70 right-title pull-right">
                                    <div class="title-content">
                                        <p>待办事项</p>
                                        <h3 class="number">90</h3>
                                        <button class="btn btn-default">待我处理<span style="color:red;">12</span></button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="content">
                                <div class="w30 left-icon pull-left">
                                    <span class="glyphicon glyphicon-file violet"></span>
                                </div>
                                <div class="w70 right-title pull-right">
                                    <div class="title-content">
                                        <p>待办事项</p>
                                        <h3 class="number">90</h3>
                                        <button class="btn btn-default">待我处理<span style="color:red;">12</span></button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="content">
                                <div class="w30 left-icon pull-left">
                                    <span class="glyphicon glyphicon-file orange"></span>
                                </div>
                                <div class="w70 right-title pull-right">
                                    <div class="title-content">
                                        <p>待办事项</p>
                                        <h3 class="number">90</h3>
                                        <button class="btn btn-default">待我处理<span style="color:red;">12</span></button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="content">
                                <div class="w30 left-icon pull-left">
                                    <span class="glyphicon glyphicon-file green"></span>
                                </div>
                                <div class="w70 right-title pull-right">
                                    <div class="title-content">
                                        <p>待办事项</p>
                                        <h3 class="number">90</h3>
                                        <button class="btn btn-default">待我处理<span style="color:red;">12</span></button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-------信息列表------->
                    <div class="row newslist" style="margin-top:20px;">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    我的事务<div class="caret"></div>
                                    <a href="#" class="pull-right"><span class="glyphicon glyphicon-refresh"></span></a>
                                </div>
                                <div class="panel-body">
                                    <div class="w15 pull-left">
                                        <img src="__INDEX__/img/noavatar_middle.gif" width="25" height="25" alt="图片" class="img-circle">
                                        安妮
                                    </div>
                                    <div class="w55 pull-left">系统需要升级</div>
                                    <div class="w20 pull-left text-center">2016年8月23日</div>
                                    <div class="w10 pull-left text-center"><span class="text-green-main">处理中</span></div>
                                </div>

                                <div class="panel-body">
                                    <div class="w15 pull-left">
                                        <img src="__INDEX__/img/noavatar_middle.gif" width="25" height="25" alt="图片" class="img-circle">
                                        安妮
                                    </div>
                                    <div class="w55 pull-left">系统需要升级</div>
                                    <div class="w20 pull-left text-center">2016年8月23日</div>
                                    <div class="w10 pull-left text-center"><span class="text-green-main">处理中</span></div>
                                </div>

                                <div class="panel-body">
                                    <div class="w15 pull-left">
                                        <img src="__INDEX__/img/noavatar_middle.gif" width="25" height="25" alt="图片" class="img-circle">
                                        安妮
                                    </div>
                                    <div class="w55 pull-left">系统需要升级</div>
                                    <div class="w20 pull-left text-center">2016年8月23日</div>
                                    <div class="w10 pull-left text-center"><span class="text-gray">已关闭</span></div>
                                </div>

                                <div class="panel-body">
                                    <div class="w15 pull-left">
                                        <img src="__INDEX__/img/noavatar_middle.gif" width="25" height="25" alt="图片" class="img-circle">
                                        安妮
                                    </div>
                                    <div class="w55 pull-left">系统需要升级</div>
                                    <div class="w20 pull-left text-center">2016年8月23日</div>
                                    <div class="w10 pull-left text-center"><span>处理中</span></div>
                                </div>
                                <div class="panel-body">
                                    <div class="w15 pull-left">
                                        <img src="__INDEX__/img/noavatar_middle.gif" width="25" height="25" alt="图片" class="img-circle">
                                        安妮
                                    </div>
                                    <div class="w55 pull-left">系统需要升级</div>
                                    <div class="w20 pull-left text-center">2016年8月23日</div>
                                    <div class="w10 pull-left text-center"><span>处理中</span></div>
                                </div>
                                <div class="panel-body">
                                    <div class="w15 pull-left">
                                        <img src="__INDEX__/img/noavatar_middle.gif" width="25" height="25" alt="图片" class="img-circle">
                                        安妮
                                    </div>
                                    <div class="w55 pull-left">系统需要升级</div>
                                    <div class="w20 pull-left text-center">2016年8月23日</div>
                                    <div class="w10 pull-left text-center"><span>处理中</span></div>
                                </div>

                                <div class="panel-body text-center">
                                    <a href="#" style="color:#5297d6;">查看全部</a>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    我的事务统计
                                    <a href="#" class="pull-right"><span class="glyphicon glyphicon-refresh"></span></a>
                                </div>
                                <div class="panel-body">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
