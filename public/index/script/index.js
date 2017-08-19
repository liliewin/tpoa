/**
 * Created by lilie on 2017/8/11.
 *
 * 主要的js操作
 */

$(function () {

    $('#logout').click(function (e) {
        var self = $(this);
        e.preventDefault();
        layer.confirm('真的要退出吗？', {
            btn: ['是的','取消'] //按钮
        }, function(){
            console.log(self.attr('href'));

           location.href = self.attr('href');
        }, function(){
            layer.msg("谢谢继续留下",{
                time:1000
            });
        });
    });

    $('.orderdel').click(function (e) {
        var self = $(this);
        e.preventDefault();
        layer.confirm('你确定要删除这个订单吗？', {
            btn: ['是的','取消'] //按钮
        }, function(){
            console.log(self.attr('href'));

            location.href = self.attr('href');
        }, function(){
            layer.msg("删除要三思",{
                time:1000
            });
        });
    });

    $('#dispatchdel').click(function (e) {
        var self = $(this);
        e.preventDefault();
        var fl = 0;
        $('.ids').each(function(){

            if ($(this).is(":checked")) {
                fl = 1;
                layer.confirm('你确定要删除选择的订单吗？', {
                    btn: ['是的','取消'] //按钮
                }, function(){

                        var ids =[];
                        //把所有的checkbox的值给一个数组
                        $('.ids').each(function () {
                            if ($(this).is(':checked')){
                                ids.push($(this).val());
                            }
                        });
                    var idsstr =  ids.join(',');
                    console.log(idsstr);
                    post(self.attr('url'),{
                        ids : ids
                    });

                }, function(){
                    layer.msg("删除要三思",{
                        time:1000
                    });
                });
            }
        });

        if (fl == 0){
            layer.alert("你没有选择任何的订单");
        }


    });




});


$(function(){
    /*换肤*/
    $(".dropdown .changecolor li").click(function(){
        var style = $(this).attr("id");
        $("link[title!='']").attr("disabled","disabled");
        $("link[title='"+style+"']").removeAttr("disabled");

        $.cookie('mystyle', style, { expires: 7 }); // 存储一个带7天期限的 cookie
    })
    var cookie_style = $.cookie("mystyle");
    if(cookie_style!=null){
        $("link[title!='']").attr("disabled","disabled");
        $("link[title='"+cookie_style+"']").removeAttr("disabled");
    }
    /*左侧导航栏显示隐藏功能*/
    $(".subNav").click(function(){
        /*显示*/
        if($(this).find("span:first-child").attr('class')=="title-icon glyphicon glyphicon-chevron-down")
        {
            $(this).find("span:first-child").removeClass("glyphicon-chevron-down");
            $(this).find("span:first-child").addClass("glyphicon-chevron-up");
            $(this).removeClass("sublist-down");
            $(this).addClass("sublist-up");
        }
        /*隐藏*/
        else
        {
            $(this).find("span:first-child").removeClass("glyphicon-chevron-up");
            $(this).find("span:first-child").addClass("glyphicon-chevron-down");
            $(this).removeClass("sublist-up");
            $(this).addClass("sublist-down");
        }
        // 修改数字控制速度， slideUp(500)控制卷起速度
        $(this).next(".navContent").slideToggle(300).siblings(".navContent").slideUp(300);
    })
    /*左侧导航栏缩进功能*/
    $(".left-main .sidebar-fold").click(function(){

        if($(this).parent().attr('class')=="left-main left-full")
        {
            $(this).parent().removeClass("left-full");
            $(this).parent().addClass("left-off");

            $(this).parent().parent().find(".right-product").removeClass("right-full");
            $(this).parent().parent().find(".right-product").addClass("right-off");

        }
        else
        {
            $(this).parent().removeClass("left-off");
            $(this).parent().addClass("left-full");

            $(this).parent().parent().find(".right-product").removeClass("right-off");
            $(this).parent().parent().find(".right-product").addClass("right-full");

        }
    })

    /*左侧鼠标移入提示功能*/
    $(".sBox ul li").mouseenter(function(){
        if($(this).find("span:last-child").css("display")=="none")
        {$(this).find("div").show();}
    }).mouseleave(function(){$(this).find("div").hide();})
})






/*
 * 全选函数
 * */
function checkAll(name) {
    var el = document.getElementsByTagName('input');
    var len = el.length;
    for(var i=0; i<len; i++){
        if((el[i].type=="checkbox") && (el[i].name==name)){
            el[i].checked = true;
        }
    }
}

/*
 * 全不选函数
 * */
function clearAll(name) {
    var el = document.getElementsByTagName('input');
    var len = el.length;
    for(var i=0; i<len; i++){
        if((el[i].type=="checkbox") && (el[i].name==name)){
            el[i].checked = false;
        }
    }

}


/*
*
* post 请求
*
* */
function post(URL, PARAMS) {
    var temp = document.createElement("form");
    temp.action = URL;
    temp.method = "post";
    temp.style.display = "none";
    for (var x in PARAMS) {
        var opt = document.createElement("textarea");
        opt.name = x;
        opt.value = PARAMS[x];
        // alert(opt.name)
        temp.appendChild(opt);
    }
    document.body.appendChild(temp);
    temp.submit();
    return temp;
}
