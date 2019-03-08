<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"C:\wamp\www\qiaoce\public/../application/admin\view\background\backgroundedit.html";i:1551776944;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\header.html";i:1551775589;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\footer.html";i:1551776944;}*/ ?>
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
<div class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">背景名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $data['name']; ?>" placeholder="最多允许输入4个字符" id="title" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">背景图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
               <span class="btn-upload form-group">
				<input class="input-text upload-url" type="text"  id="uploadfile" readonly nullmsg="请添加图片！" placeholder="....\<?php echo $data['img']; ?>" style="width:400px">
				<a href="javascript:void(0);" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览图片</a>
				<input type="file" multiple name="img" class="input-file"  >
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">详细内容：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="content" cols="" rows="" class="textarea" placeholder=""><?php echo $data['content']; ?></textarea>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" >
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <a onclick="save_put()" class="btn btn-primary radius" href="javascript:;"> 保存并发布</a>
                <a onClick="layer_close();" class="btn btn-default radius" >&nbsp;&nbsp;取消&nbsp;&nbsp;</a>
            </div>
        </div>
    </form>
</div>

</body>

</html>
<script type="text/javascript" src="__STATIC__/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui.admin/js/H-ui.admin.js"></script>

<script>
   function save_put(){
       var form = new FormData($("#form")[0]);
       $.ajax({
           url: '<?php echo url("edit_ajax"); ?>',
           type: 'post',
           data: form,
           processData: false,  // 告诉jQuery不要去处理发送的数据
           contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
           dataType: 'json',
           success:function (data) {
//              console.log(data);
               layer.msg(data,{icon:2,time:1500});
           }
           ,error: function (XmlHttpRequest, textStatus, errorThrown) {
               layer.msg('修改成功！', {icon: 1, time: 1300}, function () {
                   var index = parent.layer.getFrameIndex(window.name);
                   parent.location.reload(); //刷新父页面
                   parent.layer.close(index);
               });
           }
       });


   }
</script>
