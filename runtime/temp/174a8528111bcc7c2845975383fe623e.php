<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"C:\wamp\www\qiaoce\public/../application/admin\view\admin\admin.html";i:1551692218;}*/ ?>
﻿<!DOCTYPE HTML>
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
    <link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/skin/green/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/h-ui.admin/css/style.css" />

    <!--[if IE 6]>
    <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">

        <a href="javascript:;" onclick="admin_add('添加管理员','<?php echo url('adminAdd'); ?>','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span>
       </div>
    <table class="table table-border table-bordered table-bg">
        <thead>

        <tr class="text-c">
            <th width="120">登录名</th>
            <th width="150">角色</th>
            <th width="150">加入时间</th>
            <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): ?>
        <tr class="text-c">
            <td><?php echo $vo['username']; ?></td>
            <?php if($vo['role'] ==0): ?>
            <td>超级管理员</td>
            <?php elseif($vo['role'] ==1): ?> <td>普通管理员</td>
            <?php endif; ?>

            <td><?php echo $vo['time']; ?></td>
            <?php if($vo['role'] ==1): ?>
            <td class="td-manage">
                <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','<?php echo url('adminEdit',array('id'=>$vo['userid'])); ?>','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                <a title="删除" href="javascript:;" onclick="admin_del(this,'<?php echo $vo['userid']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
            <?php elseif($vo['role'] ==0): ?>
            <td class="td-manage" >
                超级管理员不允许有操作
            </td>

            <?php endif; ?>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    /*
     参数解释：
     title	标题
     url		请求的url
     id		需要操作的数据id
     w		弹出层宽度（缺省调默认值）
     h		弹出层高度（缺省调默认值）
     */
    /*管理员-增加*/
    function admin_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*管理员-编辑*/
    function admin_edit(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*管理员-删除*/
    function admin_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: "<?php echo url('del'); ?>",
                data:{'id':id},
                dataType: 'json',
                success: function(data){
                    layer.msg(data,{icon:2,time:1000});
                },
                error:function() {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                },
            });
        });
    }


</script>
</body>
</html>