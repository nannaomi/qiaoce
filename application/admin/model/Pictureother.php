<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/24
 * Time: 16:48
 */
namespace app\admin\model;
use think\Model;
class Pictureother extends Model{
   public function getDisplayAttr($value){
       $status = [0=>'电影',1=>'电视剧'];
       return $status[$value];
   }








}