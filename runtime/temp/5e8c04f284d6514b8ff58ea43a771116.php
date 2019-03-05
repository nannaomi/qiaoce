<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"C:\wamp\www\new\public/../application/index\view\news\more_news.html";i:1543224143;s:67:"C:\wamp\www\new\public/../application/index\view\public\header.html";i:1541127868;s:67:"C:\wamp\www\new\public/../application/index\view\public\footer.html";i:1541064569;}*/ ?>
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
    <title>中信国安新桥影视基地——基地新闻</title>
    <link rel="stylesheet" type="text/css" href="__HOMES__/css/comm.css"/>
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js "></script>
    <!--<script  src="__HOMES__/js/comm.js "></script>-->
</head>
<!--[if lt IE 9]>
<script type="text/javascript">
    document.write("<div style='position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 100; width: 100%; height: 100%; padding-top: 200px;  background-color: #fff'><P  style='font-size: 16px; text-align: center'>您正在使用 Internet Explorer 低版本，在本页面的显示效果可能有差异，建议您升级到IE9及以上版本或使用其他浏览器</P></div>")
</script>
<![endif]-->
<script>
    document.documentElement.style.fontSize=document.documentElement.clientWidth / 1920 * 100 + 'px';
</script>
<style>
    .base_news{width: 14rem;height: auto;margin:1.19rem auto auto -7rem;position: relative;float: left;left: 50%;}
    .base_news>p>a{color: #bfbfbf;float: left;}
    .base_news p span{color: #c6202a}
    #search{float: right;margin-right: .5rem}
    .search_img{width: .24rem;height: .23rem;background-position:-1.24rem -.14rem;float: right;cursor: pointer}
    input{border: none;background-color: transparent;color:#c1c1c1;font-size: .14rem}
    .list{width:14rem;height: auto;background-color:forestgreen;margin-top: .6rem }
    .list_art{width: 4.32rem;height:3.4rem;float: left;}
    .list_art p{font-size: 10px;color: #6d6b6c;margin-bottom: .04rem}
    .list img{width: 4.32rem;height: 2.44rem;overflow: hidden}
    .list_art h2{font-size: .14rem;line-height: .2rem;margin-top: .14rem}
    .list_art:nth-child(3n-1){margin: auto .45rem;}
    .list_art:nth-child(n+4){margin-top: .2rem}
    .load_div{height:.2rem;width: 14rem;float: left;margin-top: .5rem}

     .load{color: #c72127;font-size: 14px;display: block;border:.01rem solid #c72027;width: 2.48rem;height: .48rem;margin: 0 auto;}
    .load span{float: left;margin-left: 33.5%;line-height: .48rem}
    .load_img{width: .11rem;height: .12rem;float: left;background-position: -1.71rem -.2rem;margin: .19rem auto auto .1rem;}
    .load:hover{color: #FFFFFF;background-color: #c72127}
    .load:hover .load_img {-webkit-filter: drop-shadow( 0 .01rem #ffffff);filter: drop-shadow( 0 .01rem #ffffff)}

    /*底部*/
    /*footer{position: relative;float: left;margin-top: .8rem}*/

</style>
</head>
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




<div class="life_bg" ><img src="__HOMES__/images/life-bg.jpg" width="100%" height="100%"/></div>
<div class="base_news">
   <p style="font-size:17px "> <a href="<?php echo url('news'); ?>">新闻中心 ></a> <span></span></p>
    <div id="search"><input type="search" placeholder="搜索" ><div class="search_img"></div></div>
    <div class="list" id="msg">
        <?php if(is_array($code) || $code instanceof \think\Collection || $code instanceof \think\Paginator): if( count($code)==0 ) : echo "" ;else: foreach($code as $key=>$vo): ?>
           <div class="list_art">
               <p><?php echo $vo['time']; ?></p>
               <a href="<?php echo url('details',array('id'=>$vo['id'])); ?>">
                   <img src="__IMG__/content/<?php echo $vo['thumb']; ?>"/>
                   <h2><?php echo $vo['title']; ?></h2>
               </a>
           </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="load_div">
        <a class="load" id="load_more" href="javascript:;">
            <span>查看更多</span>
            <div class="load_img"></div>
        </a>
    </div>
    <input type="hidden" value="0" >
</div>
<!--<footer >
    <p>
        Copyright ©vfxcity.com. All Rights Reserved. 国安新桥（北京）影视传媒有限公司 版权所有 &nbsp;&nbsp;京ICP备14058800号 &nbsp;&nbsp;京公网安备11010502035066</p>
</footer>-->
</body>
<script>
  $(function () {
      //调转时取得当前页面路径
    var str=location.href;
    var suffix = str.substr(str.lastIndexOf("/")+1);
    var link=suffix.substr(0,suffix.lastIndexOf("."));
    if(link==0){
        $(".base_news p span").html("基地资讯");
    }else if(link==1){
        $(".base_news p span").html("行业资讯");
    }
      var track_click=0;
    $(".load").click(function () {
        track_click++;
        $("input[type='hidden']").attr("value","track_click");
          $.ajax({
              type:"post",
              url:'<?php echo url("page"); ?>',
              data:{page:track_click,link:link},
              dataType:"json",
              success:function(result){
                     var lists="";
                    $.each(result,function () {
                        lists+='<div class="list_art">'+
                                '<p>'+this.time+'</p>' +
                                '<a href="/index/news/details/id/'+this.id+'.html">' +
                                '<img src="__IMG__/content/'+this.thumb+'"/>' +
                                '<h2>'+this.title+'</h2>' +
                                '</div>';
                    });
                  $("#msg").append(lists);
              },
              error:function () {
                 $("#load_more span").text("更多内容 敬请期待！").css("margin-left","25%");
                 $(".load_img").css("display","none");
              }
          })
    });
//    搜索表单框改变颜色事件
      $("input[type='search']").focus(function () {
          $(this).css("color","#000000");
    });
//相应键盘事件
      $("input[type='search']").keydown(function(event) {
          if (event.keyCode == 13) {
              $(".search_img").click();
          }
      });
      //    搜索表单失去焦点事件
      $("input[type='search']").blur(function () {
          $(this).css("color","#c1c1c1");
      });
    //简单实现搜索功能
    $(".search_img").click(function () {
        var text= $("input[type='search']").val();
        $.ajax({
            type: "get",
            url: '<?php echo url("search"); ?>',
            data: {text: text},
            dataType: "json",
            success: function (res) {
                var searches = "";
                $.each(res['text'], function () {
                    searches += '<div class="list_art">' +
                        '<p>' + this.time + '</p>' +
                        '<a href="/index/news/details/id/'+this.id+'.html">' +
                        '<img src="__IMG__/content/' + this.img_time + '/' + this.thumb_img + '"/> ' +
                        '<h2>' + this.title + '</h2>' +
                        '</a>' +
                        '</div>';
                })
                $("#msg").html(searches);
                $(".load_div").css("display", "none");
                $(".base_news p span").html(res['find']);
            }
        })
    });
  });























</script>
</html>
