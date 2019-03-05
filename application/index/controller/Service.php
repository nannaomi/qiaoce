<?php
namespace app\index\controller;
use think\Controller;
use think\Cache\Driver\Redis;
use app\index\model\Cate;
class Service extends Controller
{
    protected function _initialize(){
        $cat=new Cate();
        $this->assign("data",$cat->gettree());
    }

    public function earlier(){
        $this->comm("前期拍摄");
        return $this->fetch();
    }
    public function later(){
        $this->comm("后期制作");

        return $this->fetch();
    }
    public function special(){
        $this->comm("特效制作");
        return $this->fetch();
    }
    public function matching(){
        $this->comm("配套服务");
        return $this->fetch();
    }
    public function comm($a){
        $data= db("cate")->where('name',$a)->find();
        $code=db("cate")->where('pid',$data['id'])->select();
        $this->assign('code',$code);
    }

    public function service(){
        $redis = new \Redis();
       $redis->connect("127.0.0.1",6379);
        $id=input('link');//二级导航的id
        $service_id='service_id_'.$id;
        $result=json_decode($redis->get($service_id),true);
        if(!$result){
            $code=db("business")->where('cid',$id)->find();
            $big=explode(',',$code['img']);//分隔大图
            foreach($big as $v){
                $type=substr($v,strpos($v,'.'));//获取缩略图类型
                $paths=substr($v,0,24);//获取缩略图的名字
                $small[]=$paths.$type;//获取到小图名
            }
            $small[0]=$code['pic'];//把小图的第一张替换
            foreach ($small as $k=>$v){
                $list[$k]['thumb_img']=$small[$k];
                $list[$k]['img']=$big[$k];
            }
            $redis->set($service_id,json_encode($list));
            $result=json_decode($redis->get($service_id),true);
            return $result;
        }else{
            return $result;
        }
    }
   
















}
