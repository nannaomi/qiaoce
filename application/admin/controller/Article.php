<?php
namespace app\admin\controller;
use app\admin\model\Article as ArticleModel ;
use think\Controller;
use think\Request;
use think\Image;
use think\paginator;
use app\admin\validate\Article as ArticleValidate;
class Article extends Controller
{
    /*
     *获取新闻列表  可共享
     */
    public function listCate($pid){
     return  db("cate")->where('pid',$pid)->select();
    }
    /*
     * 处理post或者get过来的数据去除空格和换行
     * $c 接收的数据
     */
    public function dislodge($c){

      foreach ($c as $k=>$v){
          $c[$k]=str_replace(" ","",$v);
          $c[$k]=str_replace("\n","",$c[$k]);
      }
      return $c;
    }
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


/*以上为需独立出去，可共享的内容*/


    /*文章首页*/
    public function index(){
       $this->assign('count',db("article")->count());
        return $this->fetch("article");
    }

    /*  分页查询 带条件 */
    public function mySelect(Request $request){
       if(request()->isGet()){
           $selected=input('get.');
           $articleModel=new ArticleModel();
           $selCont=$articleModel->restructure($selected);
           return $selCont;
       }
    }
    /* 添加 */
    public function article_add(){
        return $this->fetch();
    }
    public function articleSave(Request $request){
      if(request()->isPost()){
        $status=$request->only(['name','s']);//获取特定字段
         $code=$this->dislodge(input('post.'));
         $validate=new ArticleValidate();
         if(!$validate->check($code)){

          return    $validate->getError();
         }
          $file=request()->file('img');
          if($file){
              $data=$this->uploadImg($file,'');
              if(!is_array($data)){
                  $this->error($data);
              }
              $code['img']=$data['img'];
              $code['thumb_img']=$data['thumb'];
              $code['time']=strtotime($code['time']);
              $code['status']=$status['s'];
              $result = db('article')->insert($code);
              if(!$result){
                  $this->error("添加失败");
              }
              $this->success("添加成功",'article/index');
          }else{
              $this->error('请上传封面图！');
          }
      }
    }
    /*修改页面*/
    public function articleEdit(){
        $id=input('id');
        $data=db("article")->where('id',$id)->find();
        $data['time']=date("Ymd",$data['time']);
        $this->assign('data',$data);
        return $this->fetch();
    }
    public function editAjax(Request $request){
        if (request()->isPost()) {
            $code = $this->dislodge(input('post.'));
            $validate = new ArticleValidate();
            if (!$validate->check($code)) {
                return $validate->getError();

            }
            $code['time']=strtotime($code['time']);
            $file = $request->file("img");
            if($file){
                $data=$this->uploadImg($file,'');
                if(!is_array($data)){
                    $this->error($data);
                }
                $code['img']=$data['img'];
                $code['thumb_img']=$data['thumb'];
                $res=db("article")->where('id',$code['id'])->update($code);
            }else{
                //没有图片上传，直接把内容进行update
                $res=db("article")->where('id',$code['id'])->update($code);
            }
            if(!$res){
                return "修改失败，请重新修改";
            }
        }

    }

/*删除*/
    public function articleDel(){
        if (request()->isPost()) {
            $id=input('post.');
            $code=db("article")->delete($id['id']);
            if(!$code){
                return "删除失败，请重新删除";
            }
        }
    }

/*下架 上线*/
    public function articleStatus(){
       if(request()->isPost()){
           $sta=input('post.');
           $res=db("article")->where('id',$sta['id'])->update(['status'=>$sta['s']]);
           return $res;
       }
    }




}
