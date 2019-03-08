<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"C:\wamp\www\qiaoce\public/../application/admin\view\project\project.html";i:1551779163;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\header.html";i:1551775589;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\footer.html";i:1551776944;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图片管理 <span class="c-gray en">&gt;</span> 项目管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a class="btn btn-primary radius" onclick="product_add('添加','<?php echo url('projectAdd'); ?>','800')" href="javascript:;">
				<i class="Hui-iconfont">&#xe600;</i> 添加</a></span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover">
			<thead>
				<tr class="text-c">

					<th width="160">项目名称</th>
					<th width="120">项目海报</th>
					<th width="120">覆盖图</th>
					<th width="120">分类</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			  <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$data): ?>
				<tr class="text-c">
					<td class="text-c"><?php echo $data['name']; ?></td>
					<td><img height="100" class="picture-thumb" src="__IMG__/project/<?php echo $data['img']; ?>"></td>
					<td><img height="100" class="picture-thumb" src="__IMG__/project/<?php echo $data['image']; ?>"></td>
					<td class="text-c"><?php echo $data['display']; ?></td>
					<td class="td-manage">
						<a style="text-decoration:none" class="ml-5" onclick="product_edit('编辑','<?php echo url('projectEdit',array('id'=>$data['id'])); ?>','800')" href="javascript:;" title="编辑">
							<i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="product_del(this,'<?php echo $data['id']; ?>')" href="javascript:;" title="删除">
							<i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
</div>
</body>

</html>
<script type="text/javascript" src="__STATIC__/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui.admin/js/H-ui.admin.js"></script>

<script type="text/javascript">
	/*项目-添加*/
    function product_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
   /*项目-删除*/
	function product_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: "<?php echo url('del'); ?>",
				data:{'id':id},
                dataType: 'json',
                success: function(data){
                    layer.msg(data,{icon:2,time:1500});
                }, error:function() {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }

            });
        });

	}
	/*项目-编辑*/
	function product_edit(title,url,w,h){
        layer_show(title,url,w,h);
	}











/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*图片-编辑*/
function picture_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*图片-删除*/
function picture_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script>
