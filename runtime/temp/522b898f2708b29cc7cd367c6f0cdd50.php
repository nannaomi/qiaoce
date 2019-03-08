<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"C:\wamp\www\qiaoce\public/../application/admin\view\admin\adminadd.html";i:1551925858;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\header.html";i:1551775589;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\footer.html";i:1551776944;}*/ ?>
<!DOCTYPE HTML>
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

</body>

</html>
<script type="text/javascript" src="__STATIC__/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui.admin/js/H-ui.admin.js"></script>

<script >
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



</script> 
<!--/请在上方写此页面业务相关的脚本-->
