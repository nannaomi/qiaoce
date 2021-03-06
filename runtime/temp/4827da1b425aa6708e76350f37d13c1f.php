<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"C:\wamp\www\qiaoce\public/../application/admin\view\pictureother\proedit.html";i:1551341002;}*/ ?>
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
  <title>编辑项目</title>

</head>
<body>
<article class="page-container">
  <form  method="post" class="form form-horizontal" id="form">


    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3">项目名称：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input type="text" class="input-text" value="<?php echo $data['name']; ?>" placeholder="" id="username" name="name">
      </div>
    </div>

    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3">项目海报：</label>
      <div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" name="" id="uploadfile" placeholder="....\<?php echo $data['img']; ?>"  style="width:455px">
				<a href="javascript:void(0);" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览图片</a>
				<input type="file" multiple name="img" class="input-file">
				</span> </div>
    </div>

    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3">遮盖图：</label>
      <div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" name="" placeholder="....\<?php echo $data['image']; ?>" style="width:455px">
				<a href="javascript:void(0);" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览图片</a>
				<input type="file" multiple name="image" class="input-file">
				</span> </div>
    </div>

    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3">呈现方式：</label>
      <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select class="select" size="1" name="display">
                    <?php if(($data['display']==0)): ?>
                    <option value="0" selected>电影</option>
					<option value="1">电视剧</option>
                    <?php else: ?>
                    <option value="0" >电影</option>
					<option value="1" selected>电视剧</option>
                    <?php endif; ?>

				</select>
				</span>
      </div>
    </div>
      <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
    <div class="row cl">
      <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
        <a onclick="product_edit()" class="btn btn-primary radius" href="javascript:;"> 保存并发布</a>
        <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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
<script type="text/javascript" src="__STATIC__/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
        function product_edit(){
            var form = new FormData($("#form")[0]);
            $.ajax({
                url: '<?php echo url("productEdit"); ?>',
                type: 'post',
                data: form,
                processData: false,  // 告诉jQuery不要去处理发送的数据
                contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
                dataType: 'json',
                success:function (data) {
                    layer.msg(data,{icon:2,time:1500});
                },error: function (XmlHttpRequest, textStatus, errorThrown) {
                    layer.msg('修改成功！', {icon: 1, time: 1300}, function () {
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.location.reload(); //刷新父页面
                        parent.layer.close(index);
                    });
                }
            });





        }



</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>