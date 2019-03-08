<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
class Common extends Controller
{
    protected function _initialize()
    {
        $userid=Session::get('user_auth.userid');
        $username=Session::get('user_auth.username');
        $logintime=Session::get('user_auth.logintime');
        if(!$userid || !$username){
            $this->redirect("login/index");
        }
        if(time()-$logintime >2 * 60 * 60){
            Session::set('user_auth',null);
            $this->redirect("login/index");
        }
        $this->assign('name',$username);

    }
    protected function auto(){
        $username=Session::get('user_auth.username');
        if($username!='root'){
            return $this->redirect("index/auto");
        }
    }

}
