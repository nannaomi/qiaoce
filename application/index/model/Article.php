<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/12
 * Time: 15:10
 */
namespace app\index\model;
use think\Model;
class  Article extends Model{
    public function check($id){
        $result=db("article")->where('id',$id)->select();
       if(!$result){
           $id=$id-1;//如果-1不存在，则再次-1
           if($id>0){
               $this->check($id);
//            array_merge($result, $this->check($id));
           }
       }else{
//           return $result;

       }








    }


}