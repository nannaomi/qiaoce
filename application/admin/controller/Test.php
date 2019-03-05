<?php
namespace app\admin\controller;
use think\Controller;
use think\image\Exception;
use think\Request;
class Test extends Controller
{
    public function index()
    {
       return $this->fetch();
    }

    public function upload(Request $request)
    {
        //获取图片对象
        $file = $request->file('file');
        //存放服务器上地址
        $info = $file->move(ROOT_PATH . '/public/uploads');
        //访问地址

        $imageUrl = $info->getSaveName();
         return $imageUrl;
    }






















}
