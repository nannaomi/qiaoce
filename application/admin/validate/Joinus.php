<?php
namespace app\admin\validate;
use think\Validate;
class Joinus extends Validate{
 protected $rule=[
   'name'=>'require|length:1,60',
   'content'=>'require'
 ];
protected $message=[
  'name.require'=>'职位名称不能为空',
    'name.length'=>'职位名称长度过长',
    'content.require'=>'招聘内容不允许为空'
];
}