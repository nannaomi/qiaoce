<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use \app\admin\model\Pictureother as PicModel;
class Pictureother extends Controller
{
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
    public function index(){
        $data=db('project')->order('id','desc')->select();

       $picModel=new PicModel();
       foreach ($data as $k=>$v){
           $data[$k]['display']=$picModel->getDisplayAttr($v['display']);
       }
        $this->assign('data',$data);
        return $this->fetch("pictureother");
    }
//    增加页面
    public function otheradd(){
        return $this->fetch();
    }
//    增加ajax页面提交
     public function proAdd(Request $request)
     {
         if (request()->isPost()) {
             $data = $this->dislodge(input('post.'));
             if (!$data['name']) {
                 return "项目名称不允许为空";
             }
             $files = request()->file("img");
             if (count($files)==2) {
                 $pathInfo = ROOT_PATH . 'public\upload\project';
                 $arr = array();
                 foreach ($files as $k => $file) {
                     $info = $file->validate(['size' => 51200, 'ext' => 'jpg,png,jpeg'])->move($pathInfo);
                     $k = $k + 1;
                     if ($info) {
                         $arr[] = $info->getSaveName();
                     } else {
                         return "第" . $k . "张图片" . $file->getError();
                     }
                 }
                 $data['img'] = $arr[0];
                 $data['image'] = $arr[1];
                 $res = db('project')->insert($data);
                 if (!$res) {
                     return "添加失败！！！";
                 }
             } else {
                 return "项目海报和遮盖图必须同时存在！！！";
             }
         }
     }
//编辑页面
    public function proEdit(Request $request){
        $parm=$request->param();
        $data=db("project")->where('id',$parm['id'])->find();
        $this->assign('data',$data);
        return $this->fetch();
    }
//编辑提交页面
    public function productEdit(Request $request){
        if(request()->isPost()){
            $data = $this->dislodge(input('post.'));
            if (!$data['name']) {
                return "项目名称不允许为空";
            }
            $img= request()->file("img");
            $image=request()->file("image");
            $pathInfo = ROOT_PATH . 'public\upload\project';
            if($img){
                $info = $img->validate(['size' => 51200, 'ext' => 'jpg,png,jpeg'])->move($pathInfo);
                if($info){
                  $data['img']=$info->getSaveName();
              }else{
                  return '项目海报的'. $img->getError();
              }
            }
            if($image){
                $info = $image->validate(['size' => 51200, 'ext' => 'jpg,png,jpeg'])->move($pathInfo);
                if($info){
                    $data['image']=$info->getSaveName();
                }else{
                    return '遮盖图的'. $image->getError();
                }
            }
            $res=db("project")->where('id',$data['id'])->update($data);
            if(!$res){
                return "修改失败";
            }
        }
    }
// 删除
  public function del(){
    if(request()->isPost()){
        $id=input('post.id');
        $res=db("project")->delete($id);
        if(!$res){
            return "删除失败，请重新删除";
        }
    }

  }
}
