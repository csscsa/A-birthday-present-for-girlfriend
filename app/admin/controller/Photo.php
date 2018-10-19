<?php

namespace app\admin\controller;
use app\admin\model\Photos;
use app\admin\common\Base;
use think\Request;
use think\Image;
class Photo extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {


        $photo = Photos::all();
        $count = Photos::count();
        $this ->view ->assign('photo',$photo);
        $this ->view ->assign('count',$count);
        return $this ->view ->fetch('index');
    }


    public function indexadd()
    {
        return $this ->view ->fetch('indexadd');
    }



    public function indexedit()
    {
        return $this ->view ->fetch('indexedit');
    }
  

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $user = new Photos;
        $file = $request ->file('file');
        if(empty($file)){
            $this ->error('请选择上传文件');
        }
            $image = Image::open($file);
            $image ->thumb(450,500);
            $savename = $request -> time() . '.png';
            $image ->save(ROOT_PATH . 'public/static/up/' . $savename);
        $info = $file ->validate(['ext'=>'jpg,png','size'=>'1024000'])->move(ROOT_PATH . 'public/static/');
        if($info){
            $data = input('post.');

            $name = $data['name'];
            $user -> name = $name;
            $user -> path = '/up/' . $savename;
            $user -> data = time();
            $user ->save();

            $this ->success('照片上传成功');

        }else{
            $this ->error($file -> getError());
        }
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    // public function edit($id)
    // {
    //     $user = Photodate::get($id);
    //     $image = Image::open($file);
    //         $image ->thumb(450,500);
    //         $savename = $request -> time() . '.png';
    //         $image ->save(ROOT_PATH . 'public/static/up/' . $savename);
    //     $info = $file ->validate(['ext'=>'jpg,png','size'=>'1024000'])->move(ROOT_PATH . 'public/static/');
    //     if($info){
    //         $data = input('post.');

    //         $name = $data['name'];
    //         $user -> name = $name;
    //         $user -> path = '/up/' . $savename;
    //         $user -> data = time();
    //         $user ->save();

    //         $this ->success('照片上传成功');

    //     }else{
    //         $this ->error($file -> getError());
    //     }
    // }
    // }

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
       $user = Photos::destroy($id);
       $this ->success('照片删除成功');
    }
}
