<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Image;
class Business extends Common
{
/*
 * 后台做CURD功能时，直接修改redis缓存
 * 不存在set
 * 修改和删除时，直接清空此redis key  重新进行缓存
 * 不常更改的内容
 *https://blog.csdn.net/hezhengbing/article/details/79464677
 * https://www.cnblogs.com/ghc666/p/8609241.html
 */
    /*
      * 图片上传并生成缩略图   默认0 生成缩略图
      *
      */

    public function uploadImg($file,$exit=0){
        $upImg=array();
        $path = ROOT_PATH . 'public/upload/content';
        $info = $file->validate(['size' =>51200, 'ext' => 'jpg,jpeg,png'])->move($path);
        if($info){
            //成功上传后，获取上传目录
            $upImg['img']=$info->getSaveName();
            if($exit!=0){
//                    不生成缩略图的情况下，把图片的路径返回
                return $upImg['img'];
            }else{
//                    生成缩略图
                $thumbImg = Image::open($path.'/'.$upImg['img']);
                $type=$thumbImg->type();//缩略图后缀
                $fen=explode("\\",$upImg['img']);//把文件名拆分开
                $thumb_path= substr($fen[1], 0, 15);//缩略图文件名
                $upImg['thumb']=$thumb_path.'.'.$type;
                $thumbImg->thumb(432, 244)->save($path.'/'.$fen[0].'/'.$upImg['thumb']);
                return $upImg;
            }
        }else{
            return $file->getError();
        }
    }
    public function index(){
        $data=db('business')->alias('b')->field("b.id,b.cid,b.pic,c.name")->join('__CATE__ c ','b.cid= c.id','LEFT')->order("id desc")->select();
        $count=db('business')->count();
        $this->assign("count",$count);
        $this->assign("data",$data);
       return $this->fetch("photo");
    }

    public function photoAdd(){
        $arr=['前期拍摄','后期制作','特效制作','配套服务'];
        $key=array();
        foreach ($arr as $k=>$v){
            $data=db("cate")->where('name',$v)->where('pid',0)->find();
            $key[]=$data['id'];
        }
        $code=db("cate")->where('pid','in',$key)->select();
        $this->assign("data",$code);
        return $this->fetch();
    }



    public function picAdd(Request $request){
        if(request()->isPost()){

            $pro=db("business")->where('cid',input('cid'))->select();
            if(!$pro){
                $file=$request->file('img');
                if($file){
                    $info=$file->validate(['size'=>20480,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . '/public/upload/business');
                    if($info){
                        $data['pic']=$info->getSaveName();
                        $data['cid']=input('cid');
                        $result = db('business')->insert($data);
                        if (!$result) {
                            $this->error('添加失败！！！');
                        }
                        $this->redirect('business/index');
                    }else{
                        $this->error($file->getError());
                    }
                }else{
                    $this->error('请上传封面图');
                }
            }else{
                $this->error('该相册已存在','pictureadd');
            }
        }



    }

    public function pictureshow(Request $request){
        $parm=$request->param();
        $code=db("cate")->field('id,name')->where("id",$parm['cid'])->find();
        $this->assign('code',$code);
        $data=db("picture")->where('cid',$code['id'])->select();
        foreach ($data as $k=>$v){
            $data[$k]['thumb_img']=substr($v['photo'],0,8).'/'.$v['thumb_img'];
        }
        $this->assign('data',$data);
        return $this->fetch();
    }


//    相册集合增加
     public function pictureAdd(Request $request){

         $parm=$request->param();
         $this->assign('parm',$parm);
        return $this->fetch();
     }

    public function upload(Request $request)
    {
        //获取图片对象
        $file = $request->file('file');
        //存放服务器上地址
        $info = $file->move(ROOT_PATH . '/public/upload/business');
        //访问地址
        $imageUrl = $info->getSaveName();
        return $imageUrl;
    }

    public function con($i=0){

        if($i<3){
            $data['cid']=$i;
            db('picture')->insert($data);
            $this->con($i+1);
        }
}
public function makeThumb($path){
    $images=Image::open(ROOT_PATH . '/public/upload/business/'.$path);
    $date=date("Ymd",time());//获取当前时间戳
    $paths=substr($path,strpos($path,"\\")+1,15);//获取缩略图的名字
    $type=substr($path,strpos($path,'.'));//获取缩略图类型
    $images->thumb(254, 195)->save(ROOT_PATH . '/public/upload/business/'.$date.'/'.$paths.$type);
    return $paths.$type;

}
  public function imgAdd()
  {
      $pa = input('post.');
      if ($pa['imgUrl']) {
          $imgUrl = explode(',', $pa['imgUrl']);
          $len = count($imgUrl);
          Db::startTrans();
          $code = array();
          foreach ($imgUrl as $k => $v) {
              if ($k < $len) {
                  $data['cid'] = $pa['cid'];
                  $data['photo'] = $imgUrl[$k];
                  $data['thumb_img']=$this->makeThumb($imgUrl[$k]);;
                  $code[] = db('picture')->insert($data);
              }
          }
          if (!in_array('0', $code)) {
              Db::commit();
          } else {
              Db::rollback();
              return "添加失败";
          }
      } else {
          return "请选择图片";
        }

  }
    public function pictureDel(){
        if(request()->isPost()){
            $id=input('post.');
            $res=db("picture")->delete($id['id']);
            if(!$res){
                return "删除失败，请再次尝试";
            }
        }
    }
//相册编辑
public function photoEdit(Request $request){
         $arr=['前期拍摄','后期制作','特效制作','配套服务'];
         $key=array();
         foreach ($arr as $k=>$v){
             $data=db("cate")->where('name',$v)->where('pid',0)->find();
             $key[]=$data['id'];
         }
         $code=db("cate")->field('id,name')->where('pid','in',$key)->select();
         $this->assign("data",$code);
         $parm=$request->param();
         $photo=db("business")->where('id',$parm['id'])->find();
         $this->assign("con",$photo);

         return $this->fetch();
}
     public function photoEditSub(Request $request){
         if(request()->isPost()){
           $twoid=input('post.');
           $code=db("business")->where('cid',$twoid['cid'])->find();//查看是否有此相册
             if($code && ($code['id']!=$twoid['id'])){
                 $this->error("该相册已存在");
             }elseif($code && ($code['id']==$twoid['id'])){//分类不变，只变图
                 $file=$request->file('img');
                 if($file){
                     $info=$file->validate(['size'=>20480,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . '/public/upload/business');
                     if($info){
                         $data['pic']=$info->getSaveName();
                         $res=db("business")->where('id',$twoid['id'])->update($data);
                         if (!$res) {
                             $this->error('编辑失败！！！');
                         }
                         $this->success('编辑成功','business/index');
                     }else{
                         $this->error($file->getError());
                     }
                 }else{
                     $this->error("未作出修改");
                 }
             }else{//分类变

                 $data['cid']=$twoid['cid'];
                 $file=$request->file('img');
                 if($file){
                     $info=$file->validate(['size'=>20480,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . '/public/upload/business');
                     if($info){
                         $data['pic']=$info->getSaveName();
                         $res=db("business")->where('id',$twoid['id'])->update($data);
                     }else{
                         $this->error($file->getError());
                     }
                 }else{
                     $res=db("business")->where('id',$twoid['id'])->update($data);
                 }

                 if(!$res){
                     $this->error("修改失败，请再次尝试修改") ;
                 }
                 $this->success('编辑成功','business/index');
             }


         }

     }


public function photoDel(){
    if (request()->isPost()) {
        $id=input('post.');
        $code=db("business")->delete($id['id']);
        if(!$code){
            return "删除失败，请重新删除";
        }
    }
}
}





