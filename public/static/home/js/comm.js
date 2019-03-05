
/**
 * Created by Administrator on 2018/9/4.
 */
document.documentElement.style.fontSize=document.documentElement.clientWidth / 1920 * 100 + 'px';
$(function () {
    $("header .big_ul>li").hover(function () {
        $(this).children("a").css("color","#c72027");
        $(this).children("div").css("display","block");

    },function () {
        $(this).children("a").css("color","#fff");
        $(this).children("div").css("display","none");
    })  ;
 $(".two_li").hover(function(){
     $(this).css("background-color","#919297");
 },function(){
     $(this).css("background","none");

 })




});
