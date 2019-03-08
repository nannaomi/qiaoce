<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"C:\wamp\www\qiaoce\public/../application/admin\view\joinus\recruit.html";i:1551776944;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\header.html";i:1551775589;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\footer.html";i:1551776944;}*/ ?>
﻿

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
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 招聘列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">

		<div class="cl pd-5 bg-1 bk-gray mt-20">
			<span class="l">
				<a href="javascript:;" onclick="recruit_dataDel()"  class="btn btn-danger radius dataDel"><i class="Hui-iconfont">&#xe6e2;</i>批量删除</a>
			    <a class="btn btn-primary radius" onclick="recruit_add('添加职位','<?php echo url('recruitadd'); ?>','1000')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加职位</a>
			</span>

			<span class="r">共有数据：<strong> <?php echo $count; ?></strong> 条</span> </div>

		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover ">
				<thead>
					<tr class="text-c">
						<th width="80"><input name="" type="checkbox" value=""></th>
						<th width="150">招聘职位</th>
						<th>详细描述</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
				<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): ?>
					<tr class="text-c va-m">
						<td><input name="dataCheck" type="checkbox" value="<?php echo $vo['id']; ?>"></td>
						<td class="text-l"><?php echo $vo['name']; ?></td>
						<td class="text-l"><?php echo $vo['content']; ?></td>
						<td class="td-manage">
							<a style="text-decoration:none" class="ml-5" onClick="recruit_edit('职位编辑','<?php echo url('recruitedit',array('id'=>$vo['id'])); ?>','1000')" href="javascript:;" title="编辑">
								<i class="Hui-iconfont">&#xe6df;</i></a>
							<a style="text-decoration:none" class="ml-5" onClick="recruit_del(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="删除">
								<i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
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
/*招聘-添加*/
function recruit_add(title,url,w,h){
    layer_show(title,url,w,h);
}
/*招聘-删除*/
function del(id,tr){
    layer.confirm("确定要删除所选内容吗？",function () {
        $.ajax({
            type: 'POST',
            url: '<?php echo url("del"); ?>',
            data:{'id':id},
            dataType: 'json',
            success: function(data){
                layer.msg(data,{icon:2,time:1500});
            }
            ,error:function() {
                layer.msg('已删除!',{icon:1,time:1000});
                for(var i=0;i<tr.length;i++){
                    tr[i].remove();
                }
                var content=($('.r>strong').html())-tr.length;
                $('.r>strong').html(content);
            }
        });
    });
}

/*招聘-单个删除*/
function recruit_del(obj,id){
    var tr=$(obj).parents("tr");
    del(id,tr);
}
/*招聘-批量删除*/
function recruit_dataDel(){
    var checkLen=$("input[name='dataCheck']:checked").length;
    if(checkLen==0){
        layer.msg("请至少选择一项",{icon:7,time:2000});
        return;
    }
    var checkList= new Array(),checkTr=new Array();
    $("input[name='dataCheck']:checked").each(function(){
        checkList.push($(this).val());
        checkTr.push($(this).parents("tr"));
    });
     del(checkList,checkTr);

}
/*招聘-编辑*/
function recruit_edit(title,url,w,h){
    layer_show(title,url,w,h);
}










</script>

