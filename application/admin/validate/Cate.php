<?php
namespace app\admin\validate;
use think\Validate;
class Cate extends Validate{
 protected $rule=[
   'name'=>'require|chs|length:6,18'
 ];
protected $message=[
  'name.require'=>'栏目名称不能为空',
    'name.chs'=>'栏目名称只能是汉字',
    'name.length'=>'栏目名称长度不正确'
];
}