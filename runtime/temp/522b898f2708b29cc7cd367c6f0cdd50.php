<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"C:\wamp\www\qiaoce\public/../application/admin\view\admin\adminadd.html";i:1551685363;}*/ ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="__STATIC__/hui/lib/html5shiv.js"></script>
	<script type="text/javascript" src="__STATIC__/hui/lib/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/skin/green/skin.css" id="skin" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加管理员 - 管理员管理 </title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">管&nbsp;&nbsp;理&nbsp;&nbsp;员：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="请输入姓名" id="adminName" name="username">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="" placeholder="请输入6~16位由字母、数字、下划线组成的字符，其中字母和数字必须同时存在，区分大小写" id="password" name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2">
		</div>
	</div>


	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;色：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" name="role" class="input-text"  value="普通管理员(默认，不能修改)"  onfocus=this.blur()>
		</div>
	</div>

	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<a onclick="save_add()" class="btn btn-primary radius" href="javascript:;"> 保存并发布</a>
			<a onClick="layer_close();" class="btn btn-default radius" >&nbsp;&nbsp;取消&nbsp;&nbsp;</a>
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript">
    function save_add(){
      var form=new FormData($("#form")[0]);

        $.ajax({
            url: '<?php echo url("ajaxAdd"); ?>',
            type: 'post',
            data: form,
            processData: false,  // 告诉jQuery不要去处理发送的数据
            contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
            dataType: 'json',
            success:function (data) {
//                console.log(data);
                layer.msg(data,{icon:2,time:1500});
            }
            ,error: function (XmlHttpRequest, textStatus, errorThrown) {
                layer.msg('添加成功！', {icon: 1, time: 1300}, function () {
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.location.reload(); //刷新父页面
                    parent.layer.close(index);
                });
            }
        });






	}










//
//$(function(){
//	$('.skin-minimal input').iCheck({
//		checkboxClass: 'icheckbox-blue',
//		radioClass: 'iradio-blue',
//		increaseArea: '20%'
//	});
//
//	$("#form-admin-add").validate({
//		rules:{
//			adminName:{
//				required:true,
//				minlength:4,
//				maxlength:16
//			},
//			password:{
//				required:true,
//			},
//			password2:{
//				required:true,
//				equalTo: "#password"
//			},
//			sex:{
//				required:true,
//			},
//			phone:{
//				required:true,
//				isPhone:true,
//			},
//			email:{
//				required:true,
//				email:true,
//			},
//			adminRole:{
//				required:true,
//			},
//		},
//		onkeyup:false,
//		focusCleanup:true,
//		success:"valid",
//		submitHandler:function(form){
//			$(form).ajaxSubmit({
//				type: 'post',
//				url: "xxxxxxx" ,
//				success: function(data){
//					layer.msg('添加成功!',{icon:1,time:1000});
//				},
//                error: function(XmlHttpRequest, textStatus, errorThrown){
//					layer.msg('error!',{icon:1,time:1000});
//				}
//			});
//			var index = parent.layer.getFrameIndex(window.name);
//			parent.$('.btn-refresh').click();
//			parent.layer.close(index);
//		}
//	});
//});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>