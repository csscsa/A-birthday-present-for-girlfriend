<?php

namespace app\index\controller;

use app\index\common\Baseindex;
use think\Request;
use app\index\model\Photodate;
use think\Session;
use think\Image;


class Photo extends Baseindex
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $this -> isLogin();
        return $this ->view ->fetch('photo');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function upload()
    {
        $this -> isLogin();
        return $this ->view ->fetch('upload');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function up(Request $request)
    {
        $user = new Photodate;
        $file = $request ->file('file');
        if(empty($file)){
            $this ->error('请选择上传文件');
        }
            $image = Image::open($file);
            $image ->thumb(450,500);
            $savename = $request -> time() . '.png';
            $image ->save(ROOT_PATH . 'public/static/up/' . $savename);
        $info = $file ->validate(['ext'=>'jpg,png','size'=>'2048000000'])->move(ROOT_PATH . 'public/static/');
        if($info){

            $user -> name = Session::get('user_id');
            $user -> path = '/up/' . $savename;
            $user -> data = time();
            $user ->save();

            $this ->success('照片上传成功');

        }else{
            $this ->error($file -> getError());
        }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
       $user = Photodate::destroy($id);
       $this ->success('照片删除成功');
    }
}
