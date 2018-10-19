<?php

namespace app\index\controller;


use think\Request;
use app\index\common\Baseindex;
use think\Session;
use app\index\model\Fan;

class Fankui extends Baseindex
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $this -> isLogin();
        return $this ->view ->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function tijiao()
    {
        $data = input('post.');
        $text = $data['text'];
        $phone = $data['phone'];
        $email = $data['email'];

        $user = new Fan;

        $user -> name = Session::get('user_id');
        $user -> email = $email;
        $user -> phone = $phone;
        $user -> text = $text;
        $user -> time= time(); 


        if($user ->save()){
            $this ->success('感谢反馈，正在跳转......','fankui/indexa');
            // return $this -> view ->fetch('index/index');

        }else{
        $this ->success(未知错误,'logup/index');
}
    }
    public function indexa()
    {
        
        $user = Fan::name('fankui') ->select();
        //return dump($user[0]);
        // return $this ->view ->fetch('index1');
        $arr = array();
        $name = array();
        
         foreach(array_reverse($user) as $users){
            array_push($arr, $users['text']);
            array_push($name, $users['name']);
        }
       
    $all = array_combine($arr,$name);
    $this ->view ->assign('all',$all);
    return $this ->view ->fetch('index1');



}


    }



 