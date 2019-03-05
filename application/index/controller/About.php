<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Cate;
class About extends Controller{
 protected function _initialize(){
     $cat=new Cate();
     $this->assign("data",$cat->gettree());
 }
 public function service(){
      $url=input("link");
//      video//
//     $yz=db("cate")->where('')

      $data=db("cate")->field('id,url')->select();
//      $arr=array();$one=
     $one=array();
      foreach($data as $k=>$v){
          if(strpos($v['url'],$url)!==false){
              $arr[$k]['id']=$v['id'];
             $arr[$k]['url']=explode('/',$v['url']);
             if( $arr[$k]['url'][1]==$url){
                 $one[]=$arr[$k]['id'];
             }
          }
      }
      $null_pid=db('cate')->field('pid')->where('id',$one[0])->find();
      if($null_pid['pid']==0){
          $code=db("cate")->field('name,url')->where("pid",$one[0])->select();
      }else{
          $code=db("cate")->field('name,url')->where("pid",$null_pid['pid'])->select();
      }

    return $code;



 }


   public function about(){
       $data= db("cate")->where('name','关于我们')->find();
       $code=db("cate")->where('pid',$data['id'])->select();
       $this->assign('code',$code);
      $intro=db("background")->select();
     $this->assign("intro",$intro);
       return $this->fetch();
   }
   public function join(){
       $data= db("cate")->where('name','关于我们')->find();
       $code=db("cate")->where('pid',$data['id'])->select();
       $this->assign('code',$code);
    $join=db("joinus")->select();
    $arr=array();
    foreach($join as $v){
        $arr[]=$v['name'];
    }
    $this->assign("name",$arr);
    $this->assign("join",$join);
       return $this->fetch();
   }
   public function contact(){
       $data= db("cate")->where('name','关于我们')->find();
       $code=db("cate")->where('pid',$data['id'])->select();
       $this->assign('code',$code);
       return $this->fetch();
   }
   public function baselife(){
       $data= db("cate")->where('name','关于我们')->find();
       $code=db("cate")->where('pid',$data['id'])->select();
       $this->assign('code',$code);
      return $this->fetch();
    }
   public function video(){
       $data= db("cate")->where('name','关于我们')->find();
       $code=db("cate")->where('pid',$data['id'])->select();
       $this->assign('code',$code);
       return $this->fetch();
   }

    public function test(){
        $cat=new Cate();
        $as=$cat->gettree();
//var_dump($as);
//        $a=array();
        foreach ($as as $k=>$v){
            foreach ($v['cate'] as $q=>$w){
             var_dump($w);
            }
//                $a[]=$v;
//            var_dump($v);
            }
//
//
//
//
//        }
//        var_dump($a);
    }




public function q(){
        return $this->fetch("public/q");
}

}
