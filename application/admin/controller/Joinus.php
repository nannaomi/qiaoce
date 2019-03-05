<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\validate\Joinus as Join;
class Joinus extends Controller
{
//    首页
    public function index()
    {
        $data=db("joinus")->order('id desc')->select();
        $this->assign("data",$data);
        $count=count($data);
        $this->assign('count',$count);
       return $this->fetch("recruit");
    }

//    增加页面

    public function recruitadd(){
        return $this->fetch();
    }

    public function add_ajax(){
        if(request()->isPost()){
            $data=input('post.');
            $validate=new Join;
            if(!$validate->check($data)){
                return $validate->getError();
            }
        $repeat=db("joinus")->where('name',$data['name'])->select();
         if($repeat){
             return '该职位已存在';
         }
        $res=db("joinus")->insert($data);
        if(!$res){
            return "添加失败";
        }

        }
    }

//    修改
    public function recruitedit(){
      $id=input('id');
      $data=db("joinus")->where('id',$id)->find();
      $this->assign('data',$data);
        return $this->fetch();


    }
    public function edit_ajax(){
        if(request()->isPost()){
            $data=input('post.');
            $validate=new Join;
            if(!$validate->check($data)){
                return $validate->getError();
            }

            $repeat=db("joinus")->where('name',$data['name'] )->select();
            foreach ($repeat as $item) {
                if($item['id']!=$data['id']){
                    return '该职位已存在';
                }
            }
            $res=db("joinus")->where('id',$data['id'])->update($data);
            if(!$res){
                return "修改失败";
            }
        }



    }


//    删除
    public function del(){
        if (request()->isPost()) {
            $id=input('post.');
            $code=db("joinus")->delete($id['id']);
            if(!$code){
                return "删除失败，请重新删除";
            }
        }
    }
}
