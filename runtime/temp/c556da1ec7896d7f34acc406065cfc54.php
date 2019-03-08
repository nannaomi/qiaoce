<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"C:\wamp\www\qiaoce\public/../application/admin\view\cate\cate.html";i:1551779828;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\header.html";i:1551775589;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\footer.html";i:1551776944;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	栏目管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a class="btn btn-primary radius" onclick="system_category_add('添加栏目','cateAdd.html')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加栏目</a>
		</span>
		<span class="r">共有数据：<strong>54</strong> 条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg ">
			<thead>
				<tr class="text-c">
					<th width="80"></th>
					<th>栏目名称</th>
					<th width="240">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($catelist) || $catelist instanceof \think\Collection || $catelist instanceof \think\Paginator): if( count($catelist)==0 ) : echo "" ;else: foreach($catelist as $key=>$vo): if($vo['pid'] == '0'): ?>
			<tr class="text-c has_children" style="cursor: pointer">
			<td><input type="checkbox" name="id" value="<?php echo $vo['id']; ?>"></td>
				<td class="text-l"><?php echo $vo['name']; ?><b style="margin-left: 18px;">+</b></td>
			<td class="f-14"><a title="编辑" href="javascript:;" onclick="system_category_edit('栏目名修改','<?php echo url('cateEdit',array('id'=>$vo['id'],'pid'=>$vo['pid'])); ?>','1','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
			<a title="删除" href="javascript:;" onclick='system_category_del(this,"<?php echo $vo['id']; ?>")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			<?php else: ?>
			<tr class="text-c loop" style="display: none">
				<td><input type="checkbox" name="" value="<?php echo $vo['pid']; ?>"></td>
				<td class="text-l"><?php echo $vo['name']; ?></td>
				<td class="f-14"><a title="编辑" href="javascript:;" onclick="system_category_edit('栏目名修改','<?php echo url('edit',array('id'=>$vo['id'],'pid'=>$vo['pid'])); ?>','1','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a title="删除" href="javascript:;" onclick='system_category_del(this,"<?php echo $vo['id']; ?>")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			<?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
    $(function(){

        $('tbody .has_children').click(function() {
            var one_tr=$(this).find('td').eq(0).children('input').val();
            var  mark= $(this).find("b").html();
            if(mark=='+'){
                $(this).find("b").html("-");
            }else{
                $(this).find("b").html("+");
            }
            $("tbody .loop").each(function(){
                var other_tr=$(this).find('td').eq(0).children('input').val();
                if(one_tr===other_tr){
                    var display=$(this).css('display');
                    if(display== 'none'){
                        $(this).show();
                    }else{
                        $(this).css('display','none');
                    }
                }
            });
        });
    })




/*系统-栏目-添加*/
function system_category_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*系统-栏目-编辑*/
function system_category_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*系统-栏目-删除*/
function system_category_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: "<?php echo url('del'); ?>",
			dataType: 'json',
			data:{'id':id},
			success: function(data){
                layer.msg(data,{icon:2,time:1500});
			},
			error:function(data) {
                $(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
		});
	});
}

</script>
</body>
</html>