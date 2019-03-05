<?php
namespace app\admin\validate;
use think\Validate;
class Back extends Validate{
 protected $rule=[
   'name'=>'require|chs|length:12',
   'content'=>'require',
//     登录验证   $login
//   'username'=>'require|'
 ];
protected $message=[
  'name.require'=>'背景名称不能为空',
    'name.chs'=>'背景名称只能是汉字',
    'name.length'=>'背景名称只能是4个字',
    'content.require'=>'内容不允许为空'
];
/*
 * 验证码验证
 *
 */
//protected $login=[
//    'username.require'=>'用户名不允许为空',
//
//
//
//
//];

//protected $username=[
//
//
//
//];
}


































