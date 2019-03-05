<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"C:\wamp\www\new\public/../application/index\view\news\news.html";i:1541064569;s:67:"C:\wamp\www\new\public/../application/index\view\public\header.html";i:1541127868;s:67:"C:\wamp\www\new\public/../application/index\view\public\footer.html";i:1541064569;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <meta name="description" content="国安新桥（北京）影视传媒投资有限公司，是中信国安集团布局影视产业、打造国际化电影工业体系的
    重要举措，是面向国际影视产业的重要平台。公司自2014年建立以来，作为国安新桥影视特效基地的投资运营主体，一直致力于打造国际化的
    电影特效及影视后期制作产业核心力量。基地不仅配备了国际一流的全数字、网络化、集群化的电影特效制作硬件以及影视后期音视频制作系
    统等，而且凭借丰富的国内外行业资源，与影视各界人士构建多方合作。">
    <meta name="keywords" content="影棚租赁,数字棚,绿幕棚,动捕棚,后期制作,影视培训,影视特效,中国特效公司,视效,视效制作,
    特效,特效制作,特效公司,特效解析,电影后期,CG,CG制作,三维制作，三维，数字制作,国内特效,外景租赁"/>   
 <link rel="shortcut icon" type="image/x-icon" href="__HOMES__/images/ico.ico" media="screen">
    <title>中信国安新桥影视基地——新闻</title>
    <link rel="stylesheet" type="text/css" href="__HOMES__/css/comm.css"/>
    <link rel="stylesheet" type="text/css" href="__HOMES__/css/news.css"/>
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js "></script>
</head>
<!--[if lt IE 9]>
<script type="text/javascript">
    document.write("<div style='position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 100; width: 100%; height: 100%; padding-top: 200px;  background-color: #fff'><P  style='font-size: 16px; text-align: center'>您正在使用 Internet Explorer 低版本，在本页面的显示效果可能有差异，建议您升级到IE9及以上版本或使用其他浏览器</P></div>")
</script>
<![endif]-->
<body>
<header>
    <div class="oherlogo"></div>
    <div class="nav_box">
        <ul class="big_ul">
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$data): ?>
            <li><a href='<?php echo url("$data[url]"); ?>'  class="link" value="<?php echo $data['id']; ?>" ><?php echo $data['name']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="lan">中文 / EN</div>
</header>





<div class="two_nav">
    <ul >
        <?php if(is_array($code) || $code instanceof \think\Collection || $code instanceof \think\Paginator): if( count($code)==0 ) : echo "" ;else: foreach($code as $key=>$code): ?>
        <li><a><?php echo $code['name']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>

<div class="life_bg" ><img src="__HOMES__/images/newsbg.jpg" width="100%" height="100%"/></div>

<div class="new_main"></div>
<footer >
    <p>
        Copyright ©vfxcity.com. All Rights Reserved. 国安新桥（北京）影视传媒有限公司 版权所有 &nbsp;&nbsp;京ICP备14058800号 &nbsp;&nbsp;京公网安备11010502035066</p>
</footer>

</body>
<script>
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
        $(".two_nav ul li a").click(function () {
            //点击时获取导航栏的文本内容
            var link=$(this).html();
            $(this).parent("li").css("background-color","rgba(160,160,160,.35)").siblings("li").css("background-color",'');
            $.ajax({
                type:"get",
                url:'<?php echo url("service"); ?>',
                data:{link:link},
                dataType:"json",
                success:function (res){
                    var lists='<ul>';
                        $.each(res,function () {
                        lists+='<li>' +
                        '<a href="/index/news/details/id/'+this.id+'.html">' +
                            '<img src="__IMG__/content/'+this.img+'" alt=""/>' +
                            '<div class="red_bg"></div>' +
                            '<span class="fname"><h2 class="fonts">'+this.title+'</h2> </span>' +
                            '</a>' +
                            '</li>';
                    });
                    if(link=="基地资讯"){
                        lists+='</ul>' +
                            ' <p><a href="/index/news/more_news/id/0.html">更多基地资讯</a> </p>';
                    }else{
                        lists+='</ul>' +
                            ' <p><a href="/index/news/more_news/id/1.html">更多行业资讯</a> </p>';
                    }

                    $(".new_main ").html(lists);
                     if(!support_css3('mix-blend-mode')){
                        $(".red_bg").css({"mix-blend-mode":"normal","background-color":"rgba(142,0,5,.5)"});
                    }   
                }

            })
        });
        $(".two_nav ul li a").eq(0).trigger("click");//触发button的click事件

    });

</script>

</html>
