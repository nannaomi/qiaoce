<?php
use think\Route;


// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//];
//访问后台首页
Route::rule('admin','admin/Login/index');
Route::post('admin/login','admin/Login/dologin');
Route::rule('admin/index','admin/index/index');
//Route::rule('admin/index','admin/index/index');
//http://xq_qiaoce.com/admin/login/dologin.html
//http://xq_qiaoce.com/admin/index/index.html/index/welcome