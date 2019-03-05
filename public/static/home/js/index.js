
$(document).ready(function(){
    document.documentElement.style.fontSize=document.documentElement.clientWidth / 1920 * 100 + 'px';
    $(".top ul li,.top ul li div").css({"width":$(window).width()/4,"height":$(window).height()}); //高度为浏览器高度
    $(".top ul li div img").css("height",$(window).height());
    $(".top li").each(function(){
        $(this).mouseover(function () {
            $(this).children("div").slideDown(500).parent("li").siblings().children("div").slideUp(500);
        });
    });
    $(".top ul").mouseleave(function(){
        $(".top ul li div").slideUp(500);
    });
//  点击菜单按钮消失效果
    $('#closebtn').click(function() {
        if($(".top").css('display')=='block'){
            $('.top').css('display','none');
            $(this).addClass("close");
            $(this).text(' ');

        }else {
            $('.top').css('display','block');
            $(this).removeClass("close");
            $(this).text('导航');
        }
        $('nav').animate({width:'toggle'},350);
    });



//     //不经过处理的情况时候默认给首页加上红边框并倾斜
//     $(".link li").eq(0).children("p").addClass("red_border");
// //导航栏鼠标经过事件
//     $("nav li p").hover(function () {
//         $(this).addClass("red_border").parent("li").parent("a").siblings("a").children("li").children("p").removeClass("red_border");
//     });



//鼠标经过微信显示二维码
    $(".first_weixin").mouseover(function () {
        $("#two_dimensional img").attr("src",'/static/home/images/wei.jpg');
        $("#two_dimensional img").css("display",'block');
    });
//鼠标离开微信隐藏二维码
    $(".first_weixin").mouseleave(function () {
        $("#two_dimensional img").css("display",'none');
    });
//鼠标经过微博显示二维码
    $(".first_weibo").mouseover(function () {
        $("#two_dimensional img").attr("src",'/static/home/images/bo.jpg');
        $("#two_dimensional img").css("display",'block');
    });
//鼠标离开微博隐藏二维码
    $(".first_weibo").mouseleave(function () {
        $("#two_dimensional img").css("display",'none');
    });
});