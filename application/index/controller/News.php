<?php
namespace app\index\controller;
use think\cache\driver\Redis;
use think\Controller;
use app\index\model\Cate;
class News extends Controller{
    protected function _initialize(){
        $cat=new Cate();
        $this->assign("data",$cat->gettree());
    }
   public function news(){
//二级导航
       $data= db("cate")->where('name','新闻中心')->find();
       $code=db("cate")->where('pid',$data['id'])->select();
       $this->assign('code',$code);
        return $this->fetch();
   }
public function service(){
    $redis=new Redis();
    $name=input("link");
    if($name=="基地资讯"){
        $where['classify']=array('eq',0);
        $classify=0;
    }else{
        $where['classify']=array('eq',1);
        $classify=1;
    }
    $article=$redis->get('article_classify_'.$classify);
    if(!$article){
        $data=db("article")->field("id,title,thumb_img,img_time,classify")->where($where)->order('id desc')->limit('0,6')->select();
        $result=array();
        foreach ($data as $k=>$v){
            $result[$k]['id']=$v['id'];
            $result[$k]['title']=$v['title'];
            if($v['classify']==0){
                $result[$k]['classify']='base';
            }else{
                $result[$k]['classify']='trader';
            }
            $result[$k]['img']=$v['img_time']."/".$v['thumb_img'];
        }
        $redis->set('article_news_classify_'.$classify,$result);
        $article=$redis->get('article_news_classify_'.$classify);
        return $article;
    }else{
        return $article;
    }
}
//把文章全部读取
public function a(){
    $redis=new Redis();
    $a=$redis->get("a_*");
    var_dump($a);
}





    public function details(){
//        if(input('base')){
//            $id=input('base');
//        }else{
//            $id=input('trade');
//        }
        $id=input('id');
        $new=db("article")->field('id,title,cont,time,classify')->where('id',$id)->find();
        $new['title']=str_replace("<br/>","",$new['title']);
        $new['cont']=str_replace("background-color: rgb(255, 255, 255)","",$new['cont']);
      $new['cont']=str_replace("<img","<img style=\"width: 14rem;height: auto\"",$new['cont']);
      $new['cont']=str_replace("<video","<video style=\"width: 14rem;height: auto\"",$new['cont']);
      $new['cont']=str_replace("px","/100rem",$new['cont']);
      $this->assign('detail',$new);
      //上一篇-1
       $prev=db("article")->field('id,title,intro,thumb_img,img_time,time')->where('id','<',$id)->where("classify",$new['classify'])->order('id desc')->limit('1')->find();
       if($prev){
          $prev['title']=str_replace("<br/>","",$prev['title']);
       }else{
           $prev='';
       }
      $this->assign('prev',$prev);

    //下一篇+1
      $next=db("article")->field('id,title,intro,thumb_img,img_time,time')->where('id','>',$id)->where("classify",$new['classify'])->order('id asc')->limit('1')->find();
      if($next){
          $next['title']=str_replace("<br/>","",$next['title']);
      }else{
          $next='';
      }
      $this->assign('next',$next);
      return $this->fetch();
  }
  public function change(){
      if(request()->isAjax()){
          $cat=input('cate');
          $text=input("text");
          if($text=="《 上一篇"){
              $where['id']=array('lt',input('id'));
              $order="id desc";
          }else{
              $where['id']=array('gt',input('id'));
              $order="id asc";
          }
          $change=db("article")->field('id,title,intro,thumb_img,img_time,time')->where($where)->where("classify",$cat)->order($order)->limit('1')->find();
          if($change){
              $change['title']=str_replace("<br/>","",$change['title']);
          }else{
              $change='';
          }
          return $change;
      }
  }
  public function more_news(){
      $classify=input('id');
       $list=db("article")->field('id,title,img_time,thumb_img,time')->where("classify",$classify)->order("id desc")->limit('0,6')->select();
       $code=array();
       foreach($list as $k=>$v) {
           $v['thumb'] = $v['img_time'] . '/' . $v['thumb_img'];
           $v['title']=str_replace("<br/>","",$v['title']);
           $code[]=$v;
       }
      $this->assign("code",$code);
      return $this->fetch();
  }
  public function page(){
      if(request()->isAjax()){
          $page=input('page');
          $list=db("article")->where('classify',input('link'))->count();
          $page_click=ceil(($list-6)/12);//最多可点击的次数
          if($page<=$page_click){
           //接收传过来的页码$page，查询数据库
              $start=(($page-1)*12)+7;//根据页面计算出开始查询的节点
              $code=db("article")->where("classify",input('link'))->field('id,title,img_time,thumb_img,time')->limit($start,12)->order("id desc")->select();
              $res=array();
              foreach($code as $k=>$v) {
                  $v['thumb'] = $v['img_time'] . '/' . $v['thumb_img'];
                  $v['title']=str_replace("<br/>","",$v['title']);
                  $res[]=$v;
              }
              return $res;
          }
      }
  }
  public function search(){
      if(request()->isAjax()){
        $find=strip_tags(str_replace(' ','',input('text')));
        if($find){
            $text=db('article')->field('id,title,img_time,thumb_img,time')->where('title|intro|cont','like','%'.$find.'%')->order('id desc')->select();
            $code=array();
            foreach($text as $v){
                $v['title']=str_replace('<br/>','',$v['title']);
                $code[]=$v;
            }
            $res=['text'=>$code,'find'=>$find];
            return $res;
        }

          }
  }




}



?>