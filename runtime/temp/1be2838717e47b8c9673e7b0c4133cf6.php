<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"C:\wamp\www\qiaoce\public/../application/admin\view\business\photoedit.html";i:1551168277;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="__HUI__/lib/html5shiv.js"></script>
	<script type="text/javascript" src="__HUI__/lib/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="__HUI__/lib/Hui-iconfont/1.0.8/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/skin/default/skin.css" id="skin" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/css/style.css" />
	<!--[if IE 6]>
	<script type="text/javascript" src="__HUI__/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<title>相册编辑</title>
	<link href="__HUI__/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
	<form class="form form-horizontal" id="business_add" method="post" action="<?php echo url('photoEditSub'); ?>" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">所属栏目：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">

				<select name="cid" class="select" id="sel_Sub" >
					<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): if($vo['id'] == $con['cid']): ?>
					   <option value="<?php echo $vo['id']; ?>" selected> <?php echo $vo['name']; ?></option>
					 <?php else: ?>
					   <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
				       <?php endif; endforeach; endif; else: echo "" ;endif; ?>

				</select>
				</span>
			</div>
		</div>
		<br/>
		<!--请上传jpg、png、jpeg格式图片,且大小不允许超过20KB-->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">封&nbsp;&nbsp;面&nbsp;&nbsp;图：</label>
			<div class="formControls col-xs-8 col-sm-9">
               <span class="btn-upload form-group">
				<input class="input-text upload-url" type="text"  id="uploadfile" readonly placeholder="<?php echo $con['pic']; ?>" style="width:400px">
				<a href="javascript:void(0);" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 选择图片</a>
				<input type="file" multiple name="img" class="input-file" id="image_ajax" >
				</span>
			</div>
		</div>
		<input type="hidden" name="id" value="<?php echo $con['id']; ?>">
		<br/>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并发布</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__HUI__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__HUI__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->



</body>
</html>