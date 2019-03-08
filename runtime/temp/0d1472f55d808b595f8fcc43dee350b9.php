<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"C:\wamp\www\qiaoce\public/../application/admin\view\business\pictureshow.html";i:1551778007;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\header.html";i:1551775589;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\footer.html";i:1551776944;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/css/style.css" />
    <!--[if lt IE 9]>
    <script type="text/javascript">
        document.write("<div style='position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 100; width: 100%; height: 100%; padding-top: 200px;  background-color: #fff'><P  style='font-size: 16px; text-align: center'>您正在使用 Internet Explorer 低版本，在本页面的显示效果可能有差异，建议您升级到IE9及以上版本或使用其他浏览器</P></div>")
    </script>
    <![endif]-->
    <title>国安新桥后台管理系统</title>
</head>


<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 图片管理 <span class="c-gray en">&gt;</span> 业务管理 <span class="c-gray en">&gt;</span> <?php echo $code['name']; ?> <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a class="btn btn-primary radius" onclick="photo_add('添加图片','<?php echo url('pictureAdd',array('cid'=>$code['id'])); ?>','','')" href="javascript:;">
				<i class="Hui-iconfont">&#xe600;</i>
				添加图片
			</a>
		</span>
	</div>
	<div class="portfolio-content">
		<ul class="cl portfolio-area">
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$v): ?>
			<li class="item">
				<div class="portfoliobox">
					<input class="checkbox" name="checkId" type="checkbox" value="<?php echo $v['id']; ?>">
					<div class="picbox"><a href="__IMG__/business/<?php echo $v['thumb_img']; ?>" data-lightbox="gallery" ><img src="__IMG__/business/<?php echo $v['thumb_img']; ?>"></a></div>
				</div>
			</li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>
</body>


</html>
<script type="text/javascript" src="__STATIC__/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui.admin/js/H-ui.admin.js"></script>

<script type="text/javascript">
	function photo_add(title,url,w,h){

        layer_show(title,url,1000,h);
	}


  function datadel(){
      var checkLen=$("input[name='checkId']:checked").length;
      if(checkLen==0){
          layer.msg("请至少选择一项",{icon:7,time:2000});
          return;
	  }
      var checkList= new Array();checkLi=new Array();
      $("input[name='checkId']:checked").each(function(){
          checkList.push($(this).val());
          checkLi.push($(this).parents("li"));
      });
      layer.confirm("确定要删除所选图片吗？",function () {
          $.ajax({
              type: 'POST',
              url: '<?php echo url("pictureDel"); ?>',
              data:{'id':checkList},
              dataType: 'json',
              success: function(data){
                  layer.msg(data,{icon:2,time:1500});
              }
              ,error:function() {
                  for(var i=0;i<checkLi.length;i++){
                      checkLi[i].remove();
                  }
                  layer.msg('已删除!',{icon:1,time:1000});
              }
          });



      });





  }

</script>
