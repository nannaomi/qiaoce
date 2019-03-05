<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Common
{

    public function index()
    {
       return $this->fetch();
    }






    public function welcome()
    {
        return $this->fetch();
    }


    public function productbrand()
    {
        return $this->fetch();
    }
 public function bei_add(){
     return $this->fetch();
}
//招聘管理
    public function recruit(){
        return $this->fetch();
    }
    public function recruitadd(){
        return $this->fetch();
    }
    //业务图片管理
    public function picturelist(){
        return $this->fetch();
    }
    public function pictureadd(){
        return $this->fetch();
    }
    public function pictureshow(){
        return $this->fetch();
    }
    //图片其他管理
    public function pictureother(){
        return $this->fetch();
    }
    public function otheradd(){
        return $this->fetch();
    }
    public function article(){

        return $this->fetch();
    }
    public function article_add(){
        return $this->fetch();
    }
    public function cate(){
        return $this->fetch();
    }


}
