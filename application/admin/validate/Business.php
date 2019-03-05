<?php
namespace app\admin\validate;
use think\Validate;
class Business extends Validate{

// protected $rule=[
//   'img'=>'require|number'
// ];
//protected $message=[
//  'cid.require'=>'',
//    'name.chs'=>'栏目名称只能是汉字',
//    'name.length'=>'栏目名称长度不正确'
//];


 protected $rule=[
   'name'=>'require|length:4,30',

 ];
protected $message=[
    'name.require'=>'项目名称不能为空',
    'name.length'=>'项目名称长度不正确',
];
protected $scene = [
  'add'  =>  ['name']
 ];






}