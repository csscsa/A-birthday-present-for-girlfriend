<?php

namespace app\index\controller;

use app\index\common\Baseindex;
use think\Request;
use think\Session;
use app\index\model\Admin;
use think\Image;
class Touxiang extends Baseindex
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {




//           $result = Admin::name('user')->where('username',Session::get('user_id'))->find();
// $arr = array();
//  // foreach($result as $users){
//  // $aa = $users['touxiang'];
//   array_push($arr, ';lll');
 
//          return dump($result['touxiang']);

$this -> isLogin();
        return $this ->view ->fetch('index');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function up(Request $request)
    {





       $file = $request ->file('file');
        if(empty($file)){
            $this ->error('请选择上传文件');
        }
            $image = Image::open($file);
            $image ->thumb(128,128);
            $savename = $request -> time() . '.png';
            $image ->save(ROOT_PATH . 'public/static/up1/' . $savename);
            $info = $file ->validate(['ext'=>'jpg,png','size'=>'2048000000'])->move(ROOT_PATH . 'public/static/');
        if($info){

         $res = Admin::name('user')->where('username',Session::get('user_id'))->update(['touxiang'=>'/up1/' .$savename]);


            $this ->success('头像上传成功');

        }else{
            $this ->error($file -> getError());
        }




        
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
