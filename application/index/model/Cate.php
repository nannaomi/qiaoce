<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/3
 * Time: 14:10
 */
namespace app\index\model;
use think\Model;
class  Cate extends Model{
    public function gettree(){
        $data=db("cate")->where('pid',0)->select();
        $cate=array();$code=array();
        foreach ($data as $k=>$v ){
           $v['cate']='';
           $cate[]=$v;
        }
        foreach ($cate as $k=>$v){
            $v['cate']=db("cate")->where('pid',$v['id'])->select();
            $code[]=$v;
        }
        return $code;
    }



}