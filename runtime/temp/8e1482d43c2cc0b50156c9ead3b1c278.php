<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"C:\wamp\www\qiaoce\public/../application/admin\view\background\productbrand.html";i:1551775970;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\header.html";i:1551775589;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\footer.html";i:1551775215;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 背景管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">



	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		   <a class="btn btn-primary radius" onclick="synopsis_add('添加背景','backgroudadd.html','800')" href="javascript:;">
			   <i class="Hui-iconfont">&#xe600;</i>
			   添加背景
		   </a>
		</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="200">图片</th>
					<th width="200">标题</th>
					<th>具体描述</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): ?>
				<tr class="text-c">
					<td><img src="__IMG__/background/<?php echo $vo['img']; ?>" width="100" ></td>
					<td class="text-l"> <?php echo $vo['name']; ?></td>
					<td class="text-l"><?php echo $vo['content']; ?></td>
					<td class="f-14 product-brand-manage">
						<a style="text-decoration:none" onclick="synopsis_edit('编辑','<?php echo url('back_edit',array('id'=>$vo['id'])); ?>','','','800')" href="javascript:;" title="编辑">
							<i class="Hui-iconfont">&#xe6df;</i>
						</a>
						<a style="text-decoration:none" class="ml-5" onClick="synopsis_del(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="删除">
							<i class="Hui-iconfont">&#xe6e2;</i>
						</a>
					</td>
				</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
</div>


<script type="text/javascript" src="__STATIC__/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui.admin/js/H-ui.admin.js"></script>

<script type="text/javascript">
	/*介绍-添加*/
    function synopsis_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
	/*背景-编辑*/
    function synopsis_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*背景删除*/
    function synopsis_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: "<?php echo url('del'); ?>",
                data:{'id':id},
                dataType: 'json',
                success: function(data){
                    layer.msg(data,{icon:2,time:1500});
                },error:function() {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }
            });
        });


	}


</script>
</body>
</html>