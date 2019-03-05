
/**
 * Created by Administrator on 2018/9/4.
 */
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
$(function(){
    //给a标签加上跳转链接
    $("header a").click(function () {
        var link=$(this).text();
        var link_id=$(this).attr("value");
        switch (link){
            case "首页":
                $(".big_a").attr("href","{:url('Index/index')}");
                break;
            case "项目展示":
                $(".big_a").attr("href","{:url('Index/project')}");
                break;
            case "新闻中心":
                alert(link);
                // $(".big_a").attr("href",'{:url(Index/project)}');
                break;
        }


        var service=['前期拍摄','后期制作','特效制作','配套服务'];
        var in_service=$.inArray(link,service);
        if(in_service!=-1){
            ajax_service();
            // $.ajax({
            //     type:"get",
            //     url:'{:url("service")}',
            //     data:{link:link_id},
            //     dataType:"json",
            //     success:function (res){
            //         var lists=' ';
            //         console.log(res[0]['img']);
            //         $('.lright img').attr("src","__IMG__/business/"+res[0]['img']);
            //         $.each(res,function () {
            //             lists+='<li>' +
            //                 '<a href="__IMG__/business/'+this.img+'">' +
            //                 '<img src="__IMG__/business/'+this.thumb_img+'" alt="" />' +
            //                 '</a>' +
            //                 '</li>';
            //         });
            //
            //         $("aside ul").html(lists);
            //         //给页面加效果
            //         var current = '';
            //         switch (link){
            //             case ("前期拍摄"):
            //                 current="qqps_current"  ;
            //                 $(".life_bg img").attr("src","__HOMES__/images/qqps.jpg");
            //                 break;
            //             case ("后期制作"):
            //                 current="hqzz_current";
            //                 $(".life_bg img").attr("src","__HOMES__/images/hqzz.jpg");
            //                 break;
            //             case ("特效制作"):
            //                 alert(3);
            //                 current="hqzz_current";
            //                 $(".life_bg img").attr("src","__HOMES__/images/");
            //                 break;
            //             case ("配套服务"):
            //                 current="hqzz_current";
            //                 $(".life_bg img").attr("src","__HOMES__/images/");
            //                 break;
            //         }
            //
            //         $("aside li").eq(0).addClass(current);
            //         $("aside li").not(":first").addClass("meng");
            //         $("aside li ").hover(function() {
            //             $(".lright img").attr("src", $(this).children("a").attr("href"));
            //             $(this).addClass(current).removeClass("meng").siblings().removeClass(current).addClass("meng");
            //         });
            //     }
            //
            // })

        }

    });
//ajax 请求
    function ajax_service(){
        $.ajax({
            type:"get",
            url:'{:url("service")}',
            data:{link:link_id},
            dataType:"json",
            success:function (res){
                var lists=' ';
                console.log(res[0]['img']);
                $('.lright img').attr("src","__IMG__/business/"+res[0]['img']);
                $.each(res,function () {
                    lists+='<li>' +
                        '<a href="__IMG__/business/'+this.img+'">' +
                        '<img src="__IMG__/business/'+this.thumb_img+'" alt="" />' +
                        '</a>' +
                        '</li>';
                });

                $("aside ul").html(lists);
                //给页面加效果
                var current = '';
                switch (link){
                    case ("前期拍摄"):
                        current="qqps_current"  ;
                        $(".life_bg img").attr("src","__HOMES__/images/qqps.jpg");
                        break;
                    case ("后期制作"):
                        current="hqzz_current";
                        $(".life_bg img").attr("src","__HOMES__/images/hqzz.jpg");
                        break;
                    case ("特效制作"):
                        alert(3);
                        current="hqzz_current";
                        $(".life_bg img").attr("src","__HOMES__/images/");
                        break;
                    case ("配套服务"):
                        current="hqzz_current";
                        $(".life_bg img").attr("src","__HOMES__/images/");
                        break;
                }

                $("aside li").eq(0).addClass(current);
                $("aside li").not(":first").addClass("meng");
                $("aside li ").hover(function() {
                    $(".lright img").attr("src", $(this).children("a").attr("href"));
                    $(this).addClass(current).removeClass("meng").siblings().removeClass(current).addClass("meng");
                });
            }

        })
    }



})