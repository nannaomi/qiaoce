<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"C:\wamp\www\qiaoce\public/../application/admin\view\cate\edit.html";i:1533281308;}*/ ?>
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
<!--/meta 作为公共模版分离出去-->
<title></title>
</head>
<body>

<div class="page-container">

	<form action="" method="post" class="form form-horizontal" id="form-category-add" >
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">上级栏目：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="sel_Sub" name="pid" onchange="SetSubID(this);">
							 <option value="0" >无</option>
							<?php if(is_array($catelist) || $catelist instanceof \think\Collection || $catelist instanceof \think\Paginator): if( count($catelist)==0 ) : echo "" ;else: foreach($catelist as $key=>$vo): if(strpos($vo['name'],$code['name'])!==false): ?>
							     <option value="<?php echo $vo['id']; ?>" selected="selected" ><?php echo $vo['name']; ?></option>
							  <?php elseif(strpos($vo['name'],$result['name'])!==false): ?>
						     	<option style="color: red;display: none"><?php echo $result['name']; ?></option>
							  <?php else: ?>
							    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
						      <?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</select>
						</span>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">栏目名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="<?php echo $result['name']; ?>" placeholder="" id="name" name="name">
					</div>
				</div>
		        <input type="hidden" name="id" value="<?php echo $result['id']; ?>" >
		        <input type="hidden" name="init_pid" value="<?php echo $result['pid']; ?>">
		<div class="row cl">
			       <div class="col-9 col-offset-3">
				   		<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				   </div>
		        </div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__HUI__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__HUI__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__HUI__/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__HUI__/lib/jquery.validation/1.14.0/jquery.validate.js"></script>

<script type="text/javascript" src="__HUI__/lib/jquery.validation/1.14.0/validate-methods.js"></script>

<script type="text/javascript" src="__HUI__/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){

	$("#form-category-add").validate({
		rules:{
            name:{
                required:true,
                minlength:2,
                maxlength:6
            }
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
		    var data=$("#form-category-add").serializeArray();
		    var postData={};
		    $(data).each(function () {
				postData[this.name]=this.value;
            });

			$(form).ajaxSubmit({
                type: 'post',
                dataType: "json",
                url: "<?php echo url('edit_ajax'); ?>",
				data:postData,
                success: function(json){
                    layer.msg(json,{icon:2,time:1500});
                },
                error: function(XmlHttpRequest, textStatus, errorThrown){
                    layer.msg('栏目名称修改成功！',{icon:1,time:1300},function () {
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.location.reload(); //刷新父页面
                        parent.layer.close(index);
                    });
                }
			});
		}

	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>