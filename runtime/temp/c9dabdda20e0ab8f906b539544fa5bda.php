<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:50:"./application/index/view/ordermanage_addorder.html";i:1502957536;s:43:"./application/index/view/public_script.html";i:1502449502;s:40:"./application/index/view/public_nav.html";i:1502438616;s:41:"./application/index/view/public_left.html";i:1502714364;}*/ ?>
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
    <form class="form-inline" action="<?php echo U('Ordermanage/doaddorder'); ?>" method="post">
    <div class="right-product right-full">
        <section id="layout" ng-app="doc.ui-layout">
            <div ui-layout class="layout-mock">
                <ui-layout options="{ flow : 'column' }">

                    <div class="center-back right-back">
                        <div class="container-fluid">
                            <div class="info-center">
                                <div class="page-header">
                                    <div class="pull-left">
                                        <h4><?php echo (isset($title) && ($title !== '')?$title:'订单增加'); ?></h4>
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2">

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-condensed ">
                                                <tr class="ym wz"><td colspan="2" style="text-align: center">添加订单</td></tr>
                                                <tr class="ym wz">
                                                    <td >订单类型</td>
                                                    <td>
                                                    <select class="form-control" name="titleid" style="width: 150px;" >
                                                        <option value="3">网站</option>
                                                        <option value="4">域名</option>
                                                        <!--<option value="空间">空间</option>-->
                                                    </select>
                                                    </td>
                                                </tr>


                                                <!-- 网站 -->


                                                <tr class=" wz">
                                                    <td style="width: 20%">产品类型：</td>
                                                    <td>
                                                        <select class="form-control" name="pro_name" style="width: 150px;">
                                                            <?php if(is_array($olxlist) || $olxlist instanceof \think\Collection || $olxlist instanceof \think\Paginator): $i = 0; $__LIST__ = $olxlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$olx): $mod = ($i % 2 );++$i;?>
                                                            <option value="<?php echo $olx['id']; ?>"><?php echo $olx['newlx']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select>
                                                        <span><a href="#">新增类型</a></span>
                                                        <span><a href="#">管理类型</a></span>
                                                    </td>
                                                </tr>
                                               <!-- <tr class=" wz">
                                                    <td style="width: 20%">上传文件：</td>
                                                    <td>

                                                        <form   method="post"  enctype="multipart/form-data" id="uplform" action="<?php echo U('Upload/uplorderimg'); ?>" >
                                                            <label for="file">Filename:</label>
                                                            <input type="file" name="file" id="file" />
                                                            <br />
                                                            <input type="submit" name="submit" value="Submit" id="uplsubm" />
                                                        </form>
                                                    </td>
                                                </tr>-->
                                                <tr class=" wz">
                                                    <td>使用域名：</td>
                                                    <td>
                                                        <input name="netname" value="" class="form-control" type="text" ><br><br>
                                                        价格：<input name="jiage" value="" class="form-control" type="text" ><br>

                                                        备案域名：
                                                        <label class="radio-inline">
                                                             <input type="radio" id="bnetname1" value="yes" name="bnetname"> 是
                                                         </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" id="bnetname2" value="no" name="bnetname" > 否
                                                        </label>
                                                        <br>

                                                        客户提供：
                                                        <label class="radio-inline">
                                                            <input type="radio" id="cnetname1" value="yes" name="cnetname">是
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" id="cnetname2" value="no" name="cnetname" > 否
                                                        </label>



                                                    </td>
                                                </tr>
                                                <tr class=" wz"><td>公司名称：</td><td><input name="realname" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>联系人：</td><td><input name="contactor" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>公司座机：</td><td><input name="tel" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>QQ：</td><td><input name="qq" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>传真：</td><td><input name="zipcode" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>手机号码：</td><td><input name="phone" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>电子邮箱：</td><td><input name="email" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>联系地址：</td><td><input name="addess" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>模板地址：	</td><td><input name="mobannum" value="" class="form-control" type="text" ><span style="color: red">*</span></td></tr>

                                                <tr class=" wz"><td>网站要求：</td>
                                                    <td>
                                                        <textarea class="form-control" rows="4" style="width: 80%" name="Content"></textarea>
                                                    </td>
                                                </tr>
                                                <tr class=" wz">
                                                    <td>总价：</td>
                                                    <td>
                                                        <input name="price" value="" class="form-control" type="text" >
                                                        已收：<input name="dingjin" value="" class="form-control" type="text"  style="width: 50px;">
                                                        未收：<input name="weikuan" value="" class="form-control" type="text"  style="width: 50px;" >
                                                    </td>
                                                </tr>
                                                <tr class=" wz"><td>网站修改价格：</td><td><input name="cprice" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>网站价格：</td><td><input name="jishu_price" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>网站成本：</td><td><input name="wz_cb" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>提成：</td><td><input name="wz_tc" value="" class="form-control" type="text" ></td></tr>
                                                <tr class=" wz"><td>销售员名字：</td><td><input name="shoper" value="" class="form-control" type="text"  ><span style="color: red">*</span></td></tr>
                                                <tr class=" wz"><td>销售员手机号码：</td><td><input name="shoperphone" value="" class="form-control" type="text"></td></tr>


                                           <!--网站-->

                                                <!--域名-->


                                                    <tr class="ym" ><td>备案域名：</td><td><input name="beianym" value="" class="form-control" type="text" ></td></tr>
                                                    <tr class="ym"><td>产品类型：</td><td>
                                                        <select name="ympro" id="ympro"  class="form-control" >

                                                            <option value=".com">.com</option>
                                                            <option value=".cn">.cn</option>
                                                            <option value=".top">.top</option>
                                                            <option value=".net">.net</option>
                                                            <option value=".com.cn">.com.cn</option>


                                                        </select>
                                                    </td></tr>
                                                    <tr class="ym"><td>价格：</td><td><input name="ymprice" value="" class="form-control" type="text" ></td></tr>
                                                    <tr class="ym"><td>收款：</td><td>
                                                       是 <input type="radio"  name="ymsta" value="yes" >
                                                       否 <input type="radio"  name="ymsta"  value="no" >
                                                    </td></tr>
                                                    <tr class="ym"><td>销售名称：</td><td><input name="shoper" value="" class="form-control" type="text" disabled="disabled"><span style="color: red">*</span></td></tr>


                                                <!--域名-->





                                                <tr class="ym wz"><td>网站对接人：</td><td><input name="wzconcactor" value="" class="form-control" type="text"></td></tr>
                                                <tr class="ym wz">
                                                    <td  >

                                                    </td>
                                                    <td colspan="2">
                                                        <button class="btn btn-primary" type="submit">提交</button>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>

                                    </div>


                                </div>

















                            </div>
                        </div>
                    </div>



                </ui-layout>
            </div>
        </section>
    </div>
    </form>
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
    $('tr.ym').hide();
    $('tr.wz').show();

    $('[name=titleid]').change(function () {
//        alert();
        var dt = parseInt($(this).val());//定单的类型，3是网站，4是域名
//        alert(dt);
        var shoperinput = $('[name=shoper]');
        switch (dt){
            case 3:{

                //网站
                $('tr.ym').hide();
                $('tr.wz').show();
                shoperinput.eq(0).removeAttr("disabled");
                shoperinput.eq(1).attr("disabled","disabled");
                break;
            }
            case 4:{
                //域名
                $('tr.wz').hide();
                $('tr.ym').show();
                shoperinput.eq(1).removeAttr("disabled");
                shoperinput.eq(0).attr("disabled","disabled");
                break;
            }
            default :{

            }
        }
    });

/*

    $("#uplsubm").click(function (e) {
        e.preventDefault();
        var formData = new FormData($( "#uplform" )[0]);
        // formData.oid = $("#oid").val();
        console.log(formData);
        $.ajax({
            url: "<?php echo U('Upload/uplorderimg'); ?>" ,
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
                console.log(returndata);



            },
            error: function (returndata) {
                console.log(returndata);
            }
        });
    })

*/





</script>





</body>
</html>
