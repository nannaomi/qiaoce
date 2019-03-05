<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\validate;
class Admin extends Controller{
    //    生成盐
    public function salt(){
        $str="ad38vh3hv9ejFJbBDHG%WNtSOQWQBw!@#3rcjvu9830jsi*vnsFocjFsou8EFRW2EFCDSFWe#rfgvGBAVB@544225242SVF3rH";
        $salt='';
        for ( $i = 0; $i <6; $i++ ){
            $salt .= substr($str, mt_rand(0, strlen($str)-1), 1);
        }
        return $salt;
    }

    public function index(){
        $data=db("user")->select();
        foreach($data as $k=>$v){
            $data[$k]['time']=date('Y-m-d H:i:s', $v['time']);
        }
        $this->assign("data",$data);
        return $this->fetch("admin");
    }

    //   add
    public function adminAdd(){
       return $this->fetch();
    }
    public function ajaxAdd(){
        if(request()->isPost()){
           $data=input('post.');
            $validate=new validate\Admin();
           if(!$validate->check($data)){
               return $validate->getError();
           }

           if($data['password']!=$data['password2']){
               return "两次密码输入不一致";
           }
           $code['username']=$data['username'];
           $code['salt']=$this->salt();
           $code['password']=md5(md5($data['password']).$code['salt']) ;
           $code['role']=1;
           $code['time']=time();
           $res=db("user")->insert($code);
           if(!$res){
               return "添加失败";
           }

        }
    }


//    edit
    public function adminEdit(){

            $data=db("user")->field('userid,username')->where('userid',input('id'))->find();

            $this->assign("data",$data);
            return $this->fetch();
        }



    public function ajaxEdit(){
      if(request()->isPost()){
          $data=input('post.');
          $validate=new validate\Admin();
          if(!$validate->check($data)){
              return $validate->getError();
          }
          if($data['password']!=$data['password2']){
              return "两次密码输入不一致";
          }
          $code['username']=$data['username'];
          $code['password']=$data['password'];
          $code['salt']=$this->salt();
          $code['password']=md5(md5($data['password']).$code['salt']) ;
          $res=db("user")->where('userid',$data['id'])->update($code);
          if(!$res){
              return "参数错误，修改失败";
          }

      }


    }

    public function  del(){
        if (request()->isPost()) {
            $id=input('post.');
            $code=db("user")->delete($id['id']);
            if(!$code){
                return "参数错误，删除失败";
            }
        }
    }


}
