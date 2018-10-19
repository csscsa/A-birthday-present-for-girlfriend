<?php

namespace app\index\controller;

use app\index\common\Baseindex;
use think\Request;
use app\index\model\Videodate;
use think\Session;


class Video extends Baseindex
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $this -> isLogin();
        return $this ->view ->fetch('index');
    }

    



    public function play($id)
    {


        $arr = array();
        $name = array();
        $user = Videodate::name('video') ->select();
        //$user = Videodate::name($id);
        foreach($user as $use){
            array_push($arr, $use['path']);
            array_push($name, $use['name']);
            
        }
        $path = $arr[$id];
        $dis = $name[$id];

        
        $this ->view ->assign('path',$path);
        $this ->view ->assign('dis',$dis);
        return $this ->view ->fetch('video');
    }


   
}
