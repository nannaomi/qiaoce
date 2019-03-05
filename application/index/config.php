<?php
return [
    'view_replace_str'  =>  [
        '__HOMES__'=>'/static/home',
//    '__PUBLIC__'=>SITE_URL.'/public/static/home'
        '__IMG__'=>'/upload',
    ],
 //前端模块缓存
    'cache'                  => [
        // 驱动方式
        'type'   => 'Redis',
        // 缓存保存目录
        'path'   => CACHE_PATH,
        // 缓存前缀
        'prefix' => '',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,

        'host'   => '',
        'port'   => '6379',
        'password' => '',
    ],



];
