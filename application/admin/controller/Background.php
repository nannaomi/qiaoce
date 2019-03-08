<?php
namespace app\admin\controller;
use think\Request;
use think\Image;
use app\admin\validate\Back;
class Background extends Common
{
//    首页
    public function index(){
       $this->assign('data',db("background")->order('id desc')->select());
       return $this->fetch('background');
    }

//    添加页面
    public function backgroundAdd(){
       return $this->fetch();
    }

//    添加页面提交内容
    public function synopsisAdd(Request $request){
       if(request()->isPost()){
           $data=input('post.');
           $validate=new Back;
           if(!$validate->check($data)){
               return  $validate->getError();
           }
           $file = $request->file("img");
           if($file){
               $pathinfo = ROOT_PATH . 'public/upload/background';
               $info = $file->validate(['size' =>112640, 'ext' => 'jpg,png,gif'])->move($pathinfo);
               if($info){
                  $data['img']= $info->getSaveName();
               }else{
                   return $file->getError();
               }
           }else{
               return "请上传图片";
           }
           $data['name']=str_replace(' ','',$data['name']);
           $data['content']=str_replace("\n","<br/>",$data['content']);
           $data['content']=str_replace(" ","&nbsp;",$data['content']);
           $res = db('background')->insert($data);
           if(!$res){
              return "添加失败！";
           }
       }
    }

//    编辑页面
    public function backgroundEdit(){
        $data=db("background")->find(input('id'));
        $data['content']=str_replace("<br/>","\n",$data['content']);
        $this->assign("data",$data);
        return $this->fetch();
    }

//  编辑页面提交内容
    public function edit_ajax(Request $request){
        if (request()->isPost()) {
            $data=input('post.');
            $validate=new Back;
            if(!$validate->check($data)){
                return $validate->getError();
            }
            $file = $request->file("img");
            if($file){
                $pathinfo = ROOT_PATH . 'public/upload/background';
                $info = $file->validate(['size' =>112640, 'ext' => 'jpg,png,gif'])->move($pathinfo);
                if($info){
                    $data['img']= $info->getSaveName();
                }else{
                    return $file->getError();
                }
            }
            $data['name']=str_replace(' ','',$data['name']);
            $data['content']=str_replace("\n","<br/>",$data['content']);
            $data['content']=str_replace(" ","&nbsp;",$data['content']);
            $res=db("background")->where('id',$data['id'])->update($data);
           if(!$res){
              return "文件修改失败";
           }
        }
    }

//    删除
    public function  del(){
        if (request()->isPost()) {
            $id=input('post.');
            $code=db("background")->delete($id['id']);
            if(!$code){
                return "删除失败，请重新删除";
            }
        }
    }


















}




