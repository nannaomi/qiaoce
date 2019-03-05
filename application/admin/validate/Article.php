<?php
namespace app\admin\validate;
use think\Validate;
class Article extends Validate{
 protected $rule=[
   'title'=>'require|max:110',
   'intro'=>'require|length:45,450',
   'time'=>'require|date',
   'cont'=>'require'
 ];
protected $message=[
    'title.require'=>'文章标题不能为空',
    'title.max'=>'文章标题不宜过长',
    'intro.require'=>'简介不能为空',
    'intro.length'=>'简介字符长度过短或过长',
    'time.require'=>'时间不允许为空',
    'time.date'=>'请输入有效时间',
    'cont.require'=>'文章内容不允许为空'

];

}


































