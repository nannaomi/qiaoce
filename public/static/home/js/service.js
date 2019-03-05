
/**
 * Created by Administrator on 2018/10/8.
 */
document.documentElement.style.fontSize=document.documentElement.clientWidth / 1920 * 100 + 'px';
var support_css3 = (function() {
    var div = document.createElement('div'),
        vendors = 'Ms O Moz Webkit'.split(' '),
        len = vendors.length;
    return function(prop) {
        if ( prop in div.style ) return true;
        prop = prop.replace(/^[a-z]/, function(val) {
            return val.toUpperCase();
        });
        while(len--) {
            if ( vendors[len] + prop in div.style ) {
                return true;
            }
        }
        return false;
    };
})();

$(function() {
    if(support_css3('mix-blend-mode')){
        $(".two_nav ul li a").click(function () {
            //点击时获取导航栏的id
            var link = $(this).attr("value");
            $(this).parent("li").css("background-color", "rgba(255,255,255,.15)").siblings("li").css("background-color", '');
            $.ajax({
                type: "get",
                url: "Service/service",
                data: {link: link},
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    var lists = ' ';
                    $('.lright img').attr("src", "/upload/business/" + res[0]['img']);
                    $.each(res, function () {
                        lists += '<li>' +
                            '<a data-href="/upload/business/' + this.img + '">' +
                            '<img src="/upload/business/' + this.thumb_img + '" alt=""  class="left_bg_pos_first"/>' +
                            '</a>' +
                            '</li>';
                    });
                    $("aside ul").html(lists);

                    $("aside li").not(":first").addClass("meng");
                    $("aside li").eq(0).addClass("current").find("img").attr("class","left_bg_pos_secend");
                    $("aside li ").hover(function() {
                        $(".lright img").attr("src", $(this).children("a").attr("data-href"));
                        $(this).removeClass("meng").addClass("current").find("img").attr("class","left_bg_pos_secend");
                        $(this).siblings().removeClass("current").addClass("meng").find("img").attr("class","left_bg_pos_first");
                    });

                    //if 左侧图片>4
                    function change_size() {
                        $("aside ul").css("height", res.length * 1.95 + "rem");
                        $('aside').perfectScrollbar('update');
                    }
                    change_size();
                    $('aside').perfectScrollbar();
                }

            })
        });
        $(".two_nav ul li a").eq(0).trigger("click");//触发button的click事件
    }else{
        $(".two_nav ul li a").click(function () {
            //点击时获取导航栏的id
            var link = $(this).attr("value");
            $(this).parent("li").css("background-color", "rgba(255,255,255,.15)").siblings("li").css("background-color", '');
            $.ajax({
                type: "get",
                url: "Service/service",
                data: {link: link},
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    var lists = ' ';
                    $('.lright img').attr("src", "/upload/business/" + res[0]['img']);
                    $.each(res, function () {
                        lists += '<li>' +
                            '<a data-href="/upload/business/' + this.img + '">' +
                            '<img src="/upload/business/' + this.thumb_img + '" alt=""  class="left_bg_pos_first"/>' +
                            '</a>' +
                            '</li>';
                    });
                    $("aside ul").html(lists);
                    $("aside li").not(":first").addClass("meng");
                    $("aside li").eq(0).addClass("current_no_support");
                    $("aside li ").hover(function() {
                        $(".lright img").attr("src", $(this).children("a").attr("data-href"));
                        $(this).removeClass("meng").addClass("current_no_support").siblings().removeClass("current_no_support").addClass("meng");
                    });
                    //if 左侧图片>4
                    function change_size() {
                        $("aside ul").css("height", res.length * 1.95 + "rem");
                        $('aside').perfectScrollbar('update');
                    }
                    change_size();
                    $('aside').perfectScrollbar();
                }

            })
        });
        $(".two_nav ul li a").eq(0).trigger("click");//触发button的click事件
    }


});
