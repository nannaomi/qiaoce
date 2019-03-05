<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate{
//    用户名username   中文字符不超过4个字符
//    密码password     6~16个字符  区分大小写
//^[0-9a-zA-Z_]{1,}$

    protected $rule=[
        'username'=>'require|chs|length:6,12',
        'password'=>'require|length:6,16|regex:^(?![^A-Za-z]+$)(?![^0-9]+$)[0-9A-Za-z_]{6,12}$',
        'password2'=>'require|length:6,16|regex:^(?![^A-Za-z]+$)(?![^0-9]+$)[0-9A-Za-z_]{6,12}$'

    ];
    protected $message=[
        'username.require'=>'登录名不允许为空',
        'username.chs'=>'登录名只能是汉字',
        'username.length'=>'登录名的长度在2~4个汉字之间',
        'password.require'=>'密码不能为空',
        'password.length'=>'密码长度不正确',
        'password.regex'=>'请确保输入类型正确',
        'password2.require'=>'请确认密码',
        'password2.length'=>'确认密码长度不正确',
        'password2.regex'=>'确认密码输入类型不正确'
    ];

}
