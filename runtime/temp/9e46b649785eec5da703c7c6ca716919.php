<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:67:"C:\wamp\www\qiaoce\public/../application/index\view\about\join.html";i:1546072369;s:70:"C:\wamp\www\qiaoce\public/../application/index\view\public\header.html";i:1546072267;s:73:"C:\wamp\www\qiaoce\public/../application/index\view\public\about_nav.html";i:1541137239;s:70:"C:\wamp\www\qiaoce\public/../application/index\view\public\footer.html";i:1541064569;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="国安新桥（北京）影视传媒投资有限公司，是中信国安集团布局影视产业、打造国际化电影工业体系的
    重要举措，是面向国际影视产业的重要平台。公司自2014年建立以来，作为国安新桥影视特效基地的投资运营主体，一直致力于打造国际化的
    电影特效及影视后期制作产业核心力量。基地不仅配备了国际一流的全数字、网络化、集群化的电影特效制作硬件以及影视后期音视频制作系
    统等，而且凭借丰富的国内外行业资源，与影视各界人士构建多方合作。">
    <meta name="keywords" content="影棚租赁,数字棚,绿幕棚,动捕棚,后期制作,影视培训,影视特效,中国特效公司,视效,视效制作,
    特效,特效制作,特效公司,特效解析,电影后期,CG,CG制作,三维制作，三维，数字制作,国内特效,外景租赁"/>   
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="shortcut icon" type="image/x-icon" href="__HOMES__/images/ico.ico" media="screen">
    <title>中信国安新桥影视基地—加入我们</title>
    <link rel="stylesheet" type="text/css" href="__HOMES__/css/comm.css"/>
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js "></script>
    <!--<script  src="__HOMES__/js/comm.js "></script>-->
</head>
<script>
    $(function(){
        var $style=["ys0","ys1","ys2","ys3","ys4","ys5"];
        $(".left ul li").eq(0).addClass($style[0]).css("color","white");
       $(".right ul li").eq(0).addClass($style[0]);
        $(".left ul li").hover(function(){
            $(".left ul li").eq($(this).index()).addClass($style[$(this).index()]).css("color","white").siblings().removeClass().css("color","#000");
            $(".right ul li").eq($(this).index()).addClass($style[$(this).index()]).show().siblings().hide();
            $(".left ul li").eq(4).css("color",'#000000');
        })

    })
</script>
<style>




    .life_bg{position:fixed; z-index: -9999;width: 100%; height: 100%; left: 0; top:0;}
    /*招聘*/

    /*.join_main{width:13.31rem;height:8.5rem;position: relative; top: 1.97rem;margin: 0 auto;border:1px solid red;}*/

    .join_main{width:13.31rem;height:8.5rem;bottom: 0;position: relative; top: .97rem;margin: 0 auto;}

    .left{width: 5.73rem;height: 5.86rem;top:12.9%;position: absolute;float: left}
    .left ul li{box-sizing: border-box;width: 2.78rem;height: 1.85rem;border: .01rem solid #000;text-align: center;line-height: 1.85rem}
    .left ul li:nth-child(-n+4){margin-bottom: .16rem}
    .left ul li:nth-child(2n){margin-left: .17rem}
    .left ul li{font-size: .24rem;color: #000;}
    .right{width: 5.99rem;height: 100%;position: relative;float: right}
    .right ul li{width: 5.99rem;height:8.5rem;font-size:.14rem;overflow-y: auto;box-sizing: border-box;padding: 0 .45rem;line-height: .3rem;letter-spacing: .018rem }
    .right ul li p{font-size: .24rem;margin: .43rem auto;text-align: center;}
    .right ul li:not(:first-child){display: none}
    .ys0{background-color:#f06d51;}.ys1{background-color:#6541a5;color: #FFFFFF}.ys2{background-color: #17b88f}
    .ys3{background-color: #65cafe}.ys4{background-color: #ffd274}.ys5{background-color: #ff7072}

    .xq_c1 li:nth-child(9) a{color:#c72028}
    .two_nav ul li:nth-child(2){background-color: rgba(160,160,160,.35)}



    .xq_c1{height: .95rem;float: left;display: block}
    .xq_c1 li{font-size: .2rem;height: .95rem;line-height: .95rem;margin: auto .27rem}
    .xq_c1 li:nth-child(1){margin-left: 0;}
    .xq_c1 li a{font-family: 'Adobe 黑体 Std R';font-weight: 600;text-shadow: .01rem .01rem  #000;color: #fff;text-align: center}
</style>

<!--[if lt IE 9]>
<script type="text/javascript">
    document.write("<div style='position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 100; width: 100%; height: 100%; padding-top: 200px;  background-color: #fff'><P  style='font-size: 16px; text-align: center'>您正在使用 Internet Explorer 低版本，在本页面的显示效果可能有差异，建议您升级到IE9及以上版本或使用其他浏览器</P></div>")
</script>
<![endif]-->

<body>
<div style="width: 100%;height:  .95rem;background-color:rgba(0,0,0,.5);" >
    <a href="<?php echo url('index/index'); ?>" ><div class="oherlogo"></div></a>
        <ul class="xq_c1">
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$data): ?>
            <li><a href='<?php echo url("$data[url]"); ?>'  class="link" value="<?php echo $data['id']; ?>" ><?php echo $data['name']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>

    <div class="lan">中文 / EN</div>
</div>


<!--<div style="width: 100%;height:  .95rem;background-color:rgba(0,0,0,.5);" >-->
    <!--<a href="" ><div class="oherlogo"></div></a>-->
    <!--<ul class="xq_c1">-->
        <!--<li><a href="">拍摄</a></li>-->
        <!--<li><a href="">前期拍摄</a></li>-->
        <!--<li><a href="">前期拍摄</a></li>-->
        <!--<li><a href="">前期拍摄</a></li>-->
        <!--<li><a href="">前期拍摄</a></li>-->
        <!--<li><a href="">前期拍摄</a></li>-->
        <!--<li><a href="">前期拍摄</a></li>-->
        <!--<li><a href="">前期拍摄</a></li>-->
        <!--<li><a href="">前期拍摄</a></li>-->
    <!--</ul>-->
    <!--&lt;!&ndash;<div class="nav_box">&ndash;&gt;-->
    <!--&lt;!&ndash;<ul class="big_ul">&ndash;&gt;-->
    <!--&lt;!&ndash;<li><a href=''  class="link" value="" ></a></li>&ndash;&gt;-->
    <!--&lt;!&ndash;</ul>&ndash;&gt;-->
    <!--&lt;!&ndash;</div>&ndash;&gt;-->
    <!--<div class="lan">中文 / EN</div>-->

<!--</div>-->
<div class="two_nav">
    <ul >
        <?php if(is_array($code) || $code instanceof \think\Collection || $code instanceof \think\Paginator): if( count($code)==0 ) : echo "" ;else: foreach($code as $key=>$code): ?>
        <li><a href="/index/<?php echo $code['url']; ?>.html"><?php echo $code['name']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>

<div class="life_bg" ><img src="__HOMES__/images/life-bg.jpg" width="100%" height="100%"/></div>


<div class="join_main">
    <div class="left">
    <ul>
        <?php if(is_array($name) || $name instanceof \think\Collection || $name instanceof \think\Paginator): if( count($name)==0 ) : echo "" ;else: foreach($name as $key=>$vo): ?>
        <li><?php echo $vo; ?></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    </div>
    <div class="right">
        <ul>
            <?php if(is_array($join) || $join instanceof \think\Collection || $join instanceof \think\Paginator): if( count($join)==0 ) : echo "" ;else: foreach($join as $key=>$join): ?>
            <li><p><?php echo $join['name']; ?></p><?php echo $join['content']; ?></li>
           <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<footer >
    <p>
        Copyright ©vfxcity.com. All Rights Reserved. 国安新桥（北京）影视传媒有限公司 版权所有 &nbsp;&nbsp;京ICP备14058800号 &nbsp;&nbsp;京公网安备11010502035066</p>
</footer>

</body>
</html>
<script>
    document.documentElement.style.fontSize=document.documentElement.clientWidth / 1920 * 100 + 'px';
    var str=location.href;
    var suffix = str.substr(str.lastIndexOf("/")+1);
    var link=suffix.substr(0,suffix.lastIndexOf("."));
    $.ajax({
        type:"post",
        url:'<?php echo url("service"); ?>',
        data:{link:link},
        dataType:"json",
        success:function (res){
            console.log(res);
            var lists=' ';
            $.each(res,function () {
                lists+='<li class="two_li">' +
                    '<a href="javascript:;" class="link_two" value='+this.url+'>'+this.name+'</a>' +
                    '</li>';
            });
            $(".two_title .two_ul").html(lists);
            $(".link_two").click(function () {
                var link_url=$(this).attr("value");
                $(this).attr('href','/index/'+link_url+'.html');
            })
        }
    });
</script>
