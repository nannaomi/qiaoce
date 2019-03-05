<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Cate;
class Index extends Controller
{
    public function index()
    {
     $data=db("cate")->where("pid",0)->select();
     $this->assign("data",$data);
        return $this->fetch();
    }
    public function service(){
        return 123;
    }

    public function project(){
        $cat=new Cate();
        $this->assign("data",$cat->gettree());
        $this->assign("code",db("project")->order('id desc')->select());

        return $this->fetch();
    }
    public function aboutus(){
        return $this->fetch("about/aboutus");
    }

    public function baselife(){
        return $this->fetch();
    }













}
