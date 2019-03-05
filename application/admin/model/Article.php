<?php
namespace app\admin\model;
use think\Model;
class  Article extends Model{
   public function getClassifyAttr($value){
       $type = [0=>'基地资讯',1=>'行业资讯'];
       return $type[$value];
   }
    public function getStatusAttr($value){
        $status = [-1=>'已下架',0=>'已发布',1=>'草稿'];
        return $status[$value];
    }
   public function restructure($s){
       if($s['sel']===''&& $s['sel1']===''){
        $data=db("article")->field('id,title,img,thumb_img,classify,status,time')->order('id desc')->paginate(10,false,['page'=>$s['p'], 'type'=> 'Page']);
       }elseif ($s['sel']===''&& $s['sel1']!='' ){
        $data=db("article")->field('id,title,img,thumb_img,classify,status,time')->where('status',$s['sel1'])->order('id desc')->paginate(10,false,['page'=>$s['p'], 'type'=> 'Page']);
       }elseif ($s['sel']!=''&& $s['sel1']===''){
        $data=db("article")->field('id,title,img,thumb_img,classify,status,time')->where('classify',$s['sel'])->order('id desc')->paginate(10,false,['page'=>$s['p'], 'type'=> 'Page']);

       }else{
           $where['classify']=$s['sel'];
           $where['status']=$s['sel1'];
           $data=db("article")->field('id,title,img,thumb_img,classify,status,time')->where($where)->order('id desc')->paginate(10,false,['page'=>$s['p'], 'type'=> 'Page']);
       }

       $dataAll=$data->all();

       foreach ($dataAll as $k=>$v){
           $dataAll[$k]['title']=str_replace("###", "", $v['title']);
           $dataAll[$k]['thumb_img']=substr($v['img'] , 0 , 9).$v['thumb_img'];
           $dataAll[$k]['time']=date("Ymd",$v['time']);
           $dataAll[$k]['classify']=$this->getClassifyAttr($v['classify']);
           $dataAll[$k]['status']=$this->getStatusAttr($v['status']);
       }
       $result['list']=$dataAll;
       $result['page']=$data->render();
         return $result;

   }


}