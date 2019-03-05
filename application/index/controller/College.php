<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Cate;
class College extends Controller{
    protected function _initialize(){
        $cat=new Cate();
        $this->assign("data",$cat->gettree());
    }
   public  function index(){
        return $this->fetch();
   }

}



?>