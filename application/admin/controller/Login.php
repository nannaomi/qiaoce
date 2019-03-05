<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Session;
class Login extends Controller
{
    public function index(){
       return $this->fetch();
    }

   public function doLogin(Request $request){
        if(request()->isPost()){
          $data=input('post.');
            if(!captcha_check($data['code'])){
                $this->error('验证码错误');
            }
            $code=db("user")->where('username',$data['username'])->find();
            if(!$code){
                $this->error('该用户名不存在');
            }
            $password=md5(md5(trim($data['password'])).$code['salt']);
            if($code['password']!=$password){
                $this->error('密码不正确');
            }
            $auth = array('userid' => $code['userid'], 'username' => $code['username'],'logintime' => time(),);
            Session::set('user_auth',$auth);
            $this->success('登录成功', 'index/index');

        }
   }
}
