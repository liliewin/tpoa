<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:51:"./application/index/view/ordermanage_orderlist.html";i:1502978562;s:43:"./application/index/view/public_script.html";i:1503144775;s:40:"./application/index/view/public_nav.html";i:1502438616;s:41:"./application/index/view/public_left.html";i:1502714364;}*/ ?>
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

    <div class="right-product right-full">
        <section id="layout" ng-app="doc.ui-layout">
            <div ui-layout class="layout-mock">
                <ui-layout options="{ flow : 'column' }">

                    <div class="center-back right-back">
                        <div class="container-fluid">
                            <div class="info-center">
                                <div class="page-header">
                                    <div class="pull-left">
                                        <h4><?php echo $title; ?></h4>
                                    </div>

                                </div>


                        <form action="<?php echo U('Ordermanage/orderlist'); ?>" id="searchform" method="get" >

                                <div class="search-box row">
                                    <div class="col-md-12">

                                        <input type="hidden" name="titleid" value="<?php echo $send['titleid']; ?>">
                                        <div class="form-group">
                                            <span class="pull-left form-span">域名:</span>
                                            <input type="text" class="form-control" placeholder="域名" name="netname" value="<?php echo (isset($send['netname']) && ($send['netname'] !== '')?$send['netname']:''); ?>">
                                        </div>

                                        <div class="form-group">
                                            <span class="pull-left form-span">公司:</span>
                                            <input type="text" class="form-control" placeholder="公司" name="realname" value="<?php echo (isset($send['realname']) && ($send['realname'] !== '')?$send['realname']:''); ?>" >
                                        </div>
                                        <div class="form-group">
                                            <span class="pull-left form-span">对接人:</span>
                                            <input type="text" class="form-control" placeholder="对接人" name="wzconcactor" value="<?php echo (isset($send['wzconcactor']) && ($send['wzconcactor'] !== '')?$send['wzconcactor']:''); ?>" >
                                        </div>
                                        <div class="form-group">
                                            <span class="pull-left form-span">销售:</span>
                                            <input type="text" class="form-control" placeholder="销售" name="shoper" value="<?php echo (isset($send['shoper']) && ($send['shoper'] !== '')?$send['shoper']:''); ?>" >
                                        </div>
                                           <div class="form-group">
                                            <span class="pull-left form-span">产品类型:</span>
                                            <select id="pro_name" name="pro_name" class="form-control">
                                                <option value="">全部</option>

                                                <?php if(is_array($olxlist) || $olxlist instanceof \think\Collection || $olxlist instanceof \think\Paginator): $i = 0; $__LIST__ = $olxlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ol): $mod = ($i % 2 );++$i;?>
                                                <option value="<?php echo $ol['id']; ?>" <?php if($ol['id'] == $send['pro_name']): ?>selected="selected"<?php endif; ?> ><?php echo $ol['newlx']; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <span class="pull-left form-span">模板编号:</span>
                                            <input type="text" class="form-control" placeholder="模板编号" name="wangzhannum" value="<?php echo (isset($send['wangzhannum']) && ($send['wangzhannum'] !== '')?$send['wangzhannum']:''); ?>" >
                                        </div>





                                        <div class="form-group btn-search">

                                            <button class="btn btn-default" type="submit" ><span class="glyphicon glyphicon-search"></span> 搜索</button>
                                        </div>

                                    </div>


                                </div>

                        </form>

                                <div class="search-box row">

                                    <div class="col-md-4">
                                        <div class="btn-group pull-left" role="group" aria-label="...">
                                            <a type="button" class="btn btn-default" href="<?php echo U('Ordermanage/addorder'); ?>"><span class="glyphicon glyphicon-plus"></span> 新增</a>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="glyphicon glyphicon-edit"></span> 审核
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">通过</a></li>
                                                    <li><a href="#">不通过</a></li>
                                                </ul>
                                            </div>
                                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> 编辑</button>
                                            <button type="button" class="btn btn-default" id="dispatchdel" url="<?php echo U('Ordermanage/dodispatchdel'); ?>"><span class="glyphicon glyphicon-trash"></span> 删除</button>
                                        </div>
                                    </div>

                                </div>


                                <div class="clearfix"></div>





                                <div class="table-margin">
                                    <table class="table table-bordered table-header table-hover" style="text-align: center;">
                                        <thead>
                                        <tr>
                                            <td><input type="checkbox"  onClick="if(this.checked==true) { checkAll('id[]'); } else { clearAll('id[]'); }" /></td>
                                            <td class="" style="width: 5%">id</td>
                                            <td class="" style="width: 5%">收款情况</td>
                                            <td class="" style="width: 15%">域名</td>
                                            <td class="" style="width: 15%">网站名称</td>
                                            <td class="" style="width: 15%">业务名称</td>
                                            <td class="" style="width: 10%">下单时间</td>
                                            <td class="" style="width: 8%">情况</td>
                                            <td class="" style="width: 5%">网站对接人</td>
                                            <td class="" style="width: 5%">技术领单</td>
                                            <td class="" style="width: 5%">编号/级别	</td>
                                            <td class="" style="width: 12%">操作</td>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        <?php if(is_array($orderlist) || $orderlist instanceof \think\Collection || $orderlist instanceof \think\Paginator): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ol): $mod = ($i % 2 );++$i;?>
                                        <tr>
                                            <td> <input type="checkbox"  name="id[]" value="<?php echo $ol['id']; ?>" class="ids" /></td>
                                            <td><?php echo $ol['id']; ?>   </td>
                                            <td>总：<?php echo $ol['price']; ?>尾：  <span <?php if($ol['weikuan'] != 0): ?> style="color: red;" <?php endif; ?> ><?php echo $ol['weikuan']; ?></span>  </td>
                                            <td><?php echo $ol['netname']; ?> <a href="#" style="color: red;" class="picbtn" pic="__ROOT__<?php echo $ol['picspath']; ?>" realname="<?php echo $ol['realname']; ?>" >[图]</a></td>
                                            <td ><?php echo $ol['realname']; ?></td>
                                            <td><?php echo $ol['shoper']; ?></td>
                                            <td><?php echo $ol['Addtime']; ?></td>
                                            <td>

                                                <select class="form-control ask" name="ask"  >
                                                    <option value="已下单"   <?php if($ol['ask'] ==  '已下单'): ?> selected="selected" <?php endif; ?>  >已下单</option>
                                                    <option value="处理中"  <?php if($ol['ask'] ==  '处理中'): ?> selected="selected" <?php endif; ?>  >处理中</option>

                                                    <option value="等待上线"  <?php if($ol['ask'] ==  '等待上线'): ?> selected="selected" <?php endif; ?> >等待上线</option>

                                                    <option value="等待审核"  <?php if($ol['ask'] ==  '等待审核'): ?> selected="selected" <?php endif; ?> >等待审核</option>

                                                    <option value="等待验收"  <?php if($ol['ask'] ==  '等待验收'): ?> selected="selected"   <?php endif; ?>>等待验收</option>

                                                    <option value="确认收货" <?php if($ol['ask'] ==  '确认收货'): ?> selected="selected" <?php endif; ?> >已收货</option>

                                                </select>


                                            </td>
                                            <td><?php echo $ol['wzconcactor']; ?></td>
                                            <td>

                                                <input class="form-control input-sm jishunum" type="text" value="<?php echo $ol['jishunum']; ?>"   name="jishunum"/>

                                            </td>
                                            <td><?php echo $ol['wangzhannum']; ?></td>
                                            <td >
                                                <a href="<?php echo U('Upload/pics' , ['id'=> $ol['id'] ] ); ?>">加图</a>
                                                <a href="<?php echo U('Upload/note' , ['id'=> $ol['id'] ] ); ?>">备注</a>
                                                <a href="<?php echo U('Ordermanage/editorder' , ['id'=> $ol['id'] ] ); ?>">详细</a>
                                                <a href="<?php echo U('Ordermanage/dodel' , ['id'=> $ol['id'] ] ); ?>"   class="orderdel" >删除</a>
                                            </td>

                                        </tr>

                                        <?php endforeach; endif; else: echo "" ;endif; ?>





                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="12">
                                                <div class="pull-right">
                                                    <nav>
                                                       <!-- <ul class="pagination">
                                                            <li>
                                                                <a href="#" aria-label="Previous">
                                                                    <span aria-hidden="true">&laquo;</span>
                                                                </a>
                                                            </li>
                                                            <li><a href="#">1</a></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">4</a></li>
                                                            <li><a href="#">5</a></li>
                                                            <li>
                                                                <a href="#" aria-label="Next">
                                                                    <span aria-hidden="true">&raquo;</span>
                                                                </a>
                                                            </li>
                                                        </ul>-->

                                                        <?php echo $page; ?>


                                                    </nav>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>








                            </div>
                        </div>
                    </div>



                </ui-layout>
            </div>
        </section>
    </div>
</div>


<script type="text/javascript">
    /*Angular-UI-layout*/
    angular.module('doc.ui-layout', ['ui.layout']);
    $('.pagination').find('a').click(function (e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var searchform = $('#searchform').serialize();
        console.log(href);
        console.log(searchform);
        newhref = href + '&' + searchform;
        location.href = newhref;


    });


    $('.ask').change(function (e) {
        var id = $(this).parent('td').siblings('td').eq(0).find('.ids').val();//那一行的
        var ask = $(this).val();
//        console.log(ask);
        $.ajax({
            url:"<?php echo U('Ordermanage/doeditorderajax' ); ?>",
            type:"POST",
            data:{
                id : id,
                ask : ask
            },
            success:function (data) {
                console.log(data);
                if (data.msg == "更新成功" ){
                    layer.msg("更新成功");
                }else {
                    layer.msg("更新失败");
                }
            }
        });



    });


    $('.jishunum').blur(function () {
        var id = $(this).parent('td').siblings('td').eq(0).find('.ids').val();//那一行的
        var jishunum = $(this).val();
//        console.log(ask);
        $.ajax({
            url:"<?php echo U('Ordermanage/doeditorderajax' ); ?>",
            type:"POST",
            data:{
                id : id,
                jishunum : jishunum
            },
            success:function (data) {
                console.log(data);
                if (data.msg == "更新成功" ){
                    layer.msg("更新成功");
                }else {
                    layer.msg("更新失败");
                }
            }
        });
    })


    $('.picbtn').click(function (e) {
        e.preventDefault();
        var picurl = $(this).attr('pic');//图片路径
        var realname = $(this).attr('realname');//图片路径
        var picjson = {
            "title": realname, //相册标题
            "id": 123, //相册id
            "start": 0, //初始显示的图片序号，默认0
            "data": [   //相册包含的图片，数组格式
                {
                    "alt": realname,
                    "pid": 1, //图片id
                    "src": picurl, //原图地址
                    "thumb": picurl //缩略图地址
                }
            ]
        };
        //相册层.
        layer.photos({
            photos: picjson //格式见API文档手册页
            ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机
        });

    });



</script>





</body>
</html>
