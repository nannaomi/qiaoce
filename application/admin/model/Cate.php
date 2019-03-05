<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class  Cate extends Model{
   public function gettree($p=0,$lv=0){
     $data=Db::table("cate")->select();
     $tree=array();
       foreach ($data as $k=>$v){
           if($v['pid']==$p){
               $str=str_repeat("|---",$lv);
               $v['name']=$str.$v['name'];
               $tree[]=$v;
               $tree=array_merge($tree,$this->gettree($v['id'],$lv+1));
           }
       }
       return $tree;
   }
   public function tt($p=0,$lv=0){
       $data=Db::table("cate")->paginate(10);
       $code=$data->toArray();
       $tree=array();
        foreach ($code['data'] as $k=>$v){
            if($v['pid']==$p){
                $str=str_repeat("|---",$lv);
                $v['name']=$str.$v['name'];
                $tree[]=$v;
                $tree=array_merge($tree,$this->gettree($v['id'],$lv+1));
            }
        }
       $page =Db::table("cate")->paginate() ->render();
       $comm=['page'=>$page,'data'=>$tree];
       return $comm;
   }

    public function a($p=0,$lv=0){
        $data=Db::table("cate")->select();
        $tree=array();
        foreach ($data as $k=>$v){
            if($v['pid']==$p){
                $str=str_repeat("|---",$lv);
                $v['name']=$str.$v['name'];
                $tree[]=$v;
                $tree=array_merge($tree,$this->a($v['id'],$lv+1));
            }
        }
        return $tree;
//        $data=Db::table("cate")->paginate(10);
//        $page=$data->render();
//        $comm=['page'=>$page,'data'=>$tree];
//        return $page;
//        return $page;
    }







}