<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"C:\wamp\www\qiaoce\public/../application/admin\view\article\article_add.html";i:1550130449;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="__STATIC__/hui/lib/html5shiv.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="__STATIC__/hui/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->
<title>新增文章 - 资讯管理</title>
</head>
<body>
<article class="page-container">
	<form  class="form form-horizontal"  method="post" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="请控制在30个文字以内,重点换行处请用##代替" id="articletitle" name="title">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章简介：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="intro" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符，不超过150个字符" datatype="*10-150" dragonfly="true" ></textarea>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">分类栏目：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="classify" class="select" >
						<option value="0">基地资讯</option>
                        <option value="1">行业资讯</option>
					</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
			<input type="text" name="time" class="input-text" placeholder="请输入有效时间格式为20180101或2018/01/01或2018-01-01">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">封面图：</label>
			<input type="file" name="img">
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<script type="text/javascript" src="__STATIC__/hui/lib/ueditor/1.4.3/ueditor.config.js"></script>
				<script type="text/javascript" src="__STATIC__/hui/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
				<script type="text/javascript" src="__STATIC__/hui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
				<script id="editor" type="text/plain" style="width:100%;height:400px;" name="cont"></script>
			</div>
			<script type="text/javascript">
                var ue = UE.getEditor('editor');
			</script>
			<div class="tips"></div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button  class="btn btn-primary radius" type="submit" formaction="<?php echo url('article/articleSave',['s'=>0]); ?>"><i class="Hui-iconfont">&#xe632;</i> 保存并发布</button>
				<button  class="btn btn-secondary radius" type="submit" formaction="<?php echo url('article/articleSave',['s'=>1]); ?>"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</article>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__STATIC__/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__STATIC__/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->


</body>
</html>


