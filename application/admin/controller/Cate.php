<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\Cate as Category;
use app\admin\validate\Cate as Catval;
class Cate extends Common
{
//    public function __construct()
//    {
//        $username=Session::get('user_auth.username');
//        if($username!='root'){
//            return $this->redirect("index/auto");
//        }
//    }
    public function cate(){
        $this->auto();
        $cat = new Category();
        $this->assign('catelist',$cat->gettree());
        return $this->fetch();
    }
    public function cateAdd(){
        $this->auto();
        $cat = new Category();
       $this->assign('catelist',$cat->gettree());
        return $this->fetch();
    }
public function cate_add_ajax(){
    if(request()->isPost()){
        $data=str_replace(' ','',input('post.'));
        $validate=new Catval;
        if(!$validate->check($data)){
            return $validate->getError();
        }else{
            $code=db("cate")->where('pid',$data['pid'])->select();
            $arr=array();
            foreach ($code as $v){
                $arr[]=$v['name'];
            }
            if(in_array($data['name'],$arr)){
                return "该栏目名已存在，请重新输入";
            }else{
                $result=Db::table("cate")->insert($data);
                if(!$result){
                    return '添加失败,请重新添加';
                }
            }
        }
    }else{
        return "请正确上传！！！";
    }
}
public function cateEdit(){
    $cat = new Category();
    $this->assign('code',db("cate")->where('id',input('pid'))->find());
    $this->assign('result',db("cate")->find(input('id')));
    $this->assign('catelist',$cat->gettree());
    return $this->fetch();
}
public function edit_ajax(){
    if(request()->isPost()){
        $data=str_replace(' ','',input('post.'));
        $validate=new Catval;
        if(!$validate->check($data)){
            return $validate->getError();
        }else{
           $code=db("cate")->where('pid',$data['pid'])->select();
            $arr=array();
            foreach ($code as $v){
                $arr[]=$v['name'];
            }
            if(!in_array($data['name'],$arr)) {
               $init_code=db("cate")->where('pid',$data['id'])->select();
                //如果此栏目下有直接下级子栏目，不允许修改上级栏目名称，但允许修改此级栏目名
                 if($init_code){
                     //判断上级栏目名是否和数据库现存的相同,判断pid
                     if($data['pid']==$data['init_pid']){
                         if(!db("cate")->where('id', $data['id'])->update(['name'=>$data['name']])){
                             return "修改栏目名失败，请重新修改！！！";
                         }
                     }else{
                         return "该栏目下有其他子栏目，不允许直接修改上级栏目！！！";
                     }
                 }else{
                     //如果下面没有子栏目，则可以任意改动
                     if(!db("cate")->where('id', $data['id'])->update(['name'=>$data['name'],'pid'=>$data['pid']])){
                         return "修改栏目名失败，请重新修改！！！";
                     }
                 }
            }else{
                return  "该栏目下此栏目名已存在！！！";
            }
        }
    }else{
        return "请注意修改方式！！！";
    }
}
public function del(){

    if(!db("cate")->where('pid',input('id'))->select()){
       if(!db("cate")->delete(input('id'))){
           return "error";
       }
    }else{
        return "该栏目下存在子栏目，不允许直接删除！！！";
    };
}
    public function ca(){
//        $cat = new Category();
//        $a=$cat->tt();
//        $page = $a['page'];
//        $this->assign('page',$page);
//        $this->assign('catelist',$a['data']);
//        return $this->fetch();
        $cat = new Category();
        $this->assign('catelist',$cat->gettree());
        return $this->fetch();
    }


}
