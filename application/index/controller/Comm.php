<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Cate;
class Comm extends Controller
{
    public $data;   //声明公共变量$data
    public function topheader()
    {
        $cat=new Cate();
        $this->assign("data",$cat->gettree());


    }












}
