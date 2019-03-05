<?php
namespace app\index\controller;
use think\Controller;
use think\Cache\Driver\Redis;
use app\index\model\Cate;
class Index extends Controller
{
    public function index()
    {
     $data=db("cate")->where("pid",0)->select();
     $this->assign("data",$data);
        return $this->fetch();
    }
    public function project(){
        $cat=new Cate();
        $this->assign("data",$cat->gettree());
        $redis=new \Redis();
       $redis->connect("127.0.0.1",6379);
       $project=json_decode($redis->get('project'),true);    
   if(!$project){
            $redis->set('project',json_encode(db("project")->order('id desc')->select()));
            $project=json_decode($redis->get('project'),true);
            $this->assign("code",$project);
             
 }else{           
 $this->assign("code",$project);       
 }
        return $this->fetch();
    }
    public function aboutus(){
        return $this->fetch("about/aboutus");
    }

    public function baselife(){
        return $this->fetch();
    }



   public function t(){
 $redis=new \Redis();
 $redis->connect("127.0.0.1",6379); 
 $a=array(1,2,array(3,4,array(56,78)));
echo  $redis->get('a');

}









}
