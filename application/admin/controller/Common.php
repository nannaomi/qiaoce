<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
class Common extends Controller
{
    protected function _initialize()
    {
        var_dump(Session::get('user_auth'));
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



    }


//    public $prefix;
//    protected function _initialize()
//    {
//        $adminid = session('admin_auth.adminid');
//        $username = session('admin_auth.username');
//        $email = session('admin_auth.email');
//        $logintime = session('admin_auth.logintime');
//        $authority = session('admin_auth.authority');
//        if (empty($adminid) || empty($username) || empty($email) || empty($authority)) {
//            $this->redirect('/Login/index');
//        }
//        if (NOW_TIME - $logintime > 2 * 60 * 60) {
//            session('admin_auth', null);
//            $this->redirect('/Login/index');
//        }
//        $this->config = M('Site')->where(array('siteid' => 1))->find();
//        $this->assign('config', $this->config);
//        $this->adminauth = M('auth')->where(array('id' => $authority))->find();
//        $this->assign('adminauth', $this->adminauth);
//        $this->prefix = C('DB_PREFIX');
//    }
}
