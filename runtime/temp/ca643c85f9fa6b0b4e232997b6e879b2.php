<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"C:\wamp\www\qiaoce\public/../application/admin\view\article\article.html";i:1551777236;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\header.html";i:1551775589;s:70:"C:\wamp\www\qiaoce\public/../application/admin\view\public\footer.html";i:1551776944;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;"  class="btn btn-danger radius dataDel"><i class="Hui-iconfont">&#xe6e2;</i>批量删除</a>
	        <a class="btn btn-primary radius articleAdd" data-title="添加资讯"   href="javascript:;">
				<i class="Hui-iconfont">&#xe600;</i> 添加资讯</a>
		</span>
		<span class="r">共有文章：<strong><?php echo $count; ?></strong> 篇</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-responsive">
			<thead>
			<tr class="text-c">
				<th width="50"></th>
				<th>标题</th>
					<th width="150">封面图</th>
					<th width="150">
						<select id="mySelect">
							<option value="" selected>分类</option>
							<option value="0">基地资讯</option>
							<option value="1">行业资讯</option>
						</select>
					</th>
					<th width="150">时间</th>
					<th width="150">
						<select id="mySelect1">
							<option value="" selected>发布状态</option>
							<option value="1">草稿</option>
							<option value="0">已发布</option>
							<option value="-1">已下架</option>
						</select>
					</th>
					<th width="150">操作</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
		<div id="page"></div>

	</div>
</div>
</body>

</html>
<script type="text/javascript" src="__STATIC__/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui.admin/js/H-ui.admin.js"></script>




<script type="text/javascript">
    $(function() {
        <!-- ajax 分页 带条件查询 page=>当前点击页码；  c:分类；s:状态； -->
        function postData(c,s,page){
            if(page===''){
                return false;
            }
            $.get("<?php echo url('mySelect'); ?>",{'sel':c,'sel1':s,'p':page}, function(data) {
                var html='';
                $.each(data.list,function(i,v){
                    html+='<tr class="text-c">' +
                        '<td><input type="checkbox" value="'+v.id+'" name="dataCheck"></td>' +
                        '<td class="text-l">'+v.title+'</td>'+
                        '<td><img height="80" class="picture-thumb" src="__IMG__/content/'+v.thumb_img+'"></a></td>'+
                        '<td>'+v.classify+'</td>'+
                        '<td>'+v.time+'</td>' +
                        '<td class="td-status"><span class="label label-success radius">'+v.status+'</span></td>' +
                        '<td class="f-14 td-manage">' +
                        '<a style="text-decoration:none" class="articleStop" data-status="-1"  href="javascript:;" title="下架">' +
                        '<i class="Hui-iconfont">&#xe6de;</i></a>' +
                        '<a style="text-decoration:none" class="ml-5 edit"  href="javascript:;" title="编辑"> ' +
                        '<i class="Hui-iconfont">&#xe6df;</i></a>' +
                        '<a style="text-decoration:none" class="ml-5 del"   href="javascript:;" title="删除" >' +
                        '<i class="Hui-iconfont">&#xe6e2;</i></a></td>' +
                        '</tr>';
                });
                $("tbody").html(html);
                $("tbody tr").each(function(){
                    var con=$(this).children(".td-status").text();
                    if(con=="已下架"){
                        $(this).children(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
                        $(this).children(".td-manage").prepend('<a style="text-decoration:none" class="articleStart" data-status="0" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
                        $(this).children(".td-manage").children(".articleStop").remove();
                    }else if(con=="草稿"){
                        $(this).children(".td-manage").prepend('<a style="text-decoration:none" class="articleStart" data-status="0" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
                        $(this).children(".td-manage").children(".articleStop").remove();
                    }
                });
                var page=data.page;
                $("#page").html(page);

            })
        }
        <!-- 选中新闻分类进行分类选择内容 $classify 分类; $status 状态 -->
        $("#mySelect,#mySelect1").change(function () {
            var classify=$("#mySelect").children('option:selected').val();
            var status=$("#mySelect1").children('option:selected').val();
            var page=1;
            $("#mySelect,#mySelect1").children('option:selected').attr("selected","selected").siblings("option").removeAttr("selected");
            postData(classify,status,page);
        });
        <!-- 刷新进入页面时自动执行 -->
        $("#mySelect").trigger("change");
        <!-- 点击页码跳转 -->
        $(document).on('click', '.pagination a', function() {
            var url = $(this).attr('href');
            var page = url.substr(url.lastIndexOf("=")+1);
            var c=$("#mySelect").children('option:selected').val();
            var s=$("#mySelect1").children('option:selected').val();
            postData(c,s,page);
            return false;
        });


<!-- 以下为给节点添加的事件  -->

		/*资讯-添加*/
        $(document).on('click', '.articleAdd', function(){
            var index = layer.open({
                type: 2,
                title: "添加资讯",
                content:'/admin/article/articleAdd'
            });
            layer.full(index);
        });
		/*资讯-编辑*/
        $(document).on('click', '.edit', function(){
            var id=$(this).parent("td").siblings("td").eq(0).children("input").val();
            var index = layer.open({
                type: 2,
                title: "资讯编辑",
                content:'/admin/article/articleEdit/id/'+id
            });
            layer.full(index);
        });
		/*资讯-删除*/
        function del(id,tr){
            layer.confirm("确定要删除所选文章吗？",function () {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo url("articleDel"); ?>',
                    data:{'id':id},
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
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
        /* 单个删除 */
        $(document).on('click','.del',function () {
            var id=$(this).parent("td").siblings("td").eq(0).children("input").val();
            var tr=$(this).parents("tr");
            del(id,tr);
        });

		/*批量删除*/
        $(document).on('click','.dataDel',function () {
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
        });
		/*资讯-下架*/
		$(document).on('click','.articleStop',function () {
            var itself=$(this);
            var id=$(this).parent("td").siblings("td").eq(0).children("input").val();
            var s= $(this).data("status");
            layer.confirm('确认要下架吗？',function(){
                $.post('<?php echo url("article/articleStatus"); ?>',{s:s,id:id},function (data) {
                    console.log(data);
                    if(data=='0'){
                        layer.msg("下架失败",{icon:2,time:1500});
					}else{
                        itself.parent("td").siblings(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
                        itself.parent().prepend('<a style="text-decoration:none" class="articleStart" data-status="0" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
                        itself.parent().children(".articleStop").remove();
                       layer.msg('已下架!',{icon: 5,time:1000});
					}
                })
            })
        });
        /*资讯-发布*/
        $(document).on('click','.articleStart',function () {
            var itself=$(this);
            var id=itself.parent("td").siblings("td").eq(0).children("input").val();
            var s= itself.data("status");
            layer.confirm('确认要发布吗？',function(){
                $.post('<?php echo url("article/articleStatus"); ?>',{s:s,id:id},function (data) {
                    console.log(data);
                    if(data=='0'){
                        layer.msg("发布失败",{icon:2,time:1500});
                    }else{
                        itself.parent("td").siblings(".td-status").html('<span class="label label-success radius">已发布</span>');
                        itself.parent().prepend('<a style="text-decoration:none" class="articleStop" data-status="-1" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
                        itself.parent().children(".articleStart").remove();
                        layer.msg('已发布!',{icon: 6,time:1000});
                    }
                })
            });
        });

    });

</script> 
