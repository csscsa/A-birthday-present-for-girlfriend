<?php
namespace app\admin\common;
use think\Controller;
use think\Session;
use app\admin\common\Base;
class Base extends Controller
{
      protected function _initialize(){
      	//parent:: _initialize;
      	//判断用户登录状态
      	


      }

      protected function isLogin()
      {

         if(is_null(Session::get('user'))){
         	$this ->error('未登录，无权访问','login/index');

         }

      }
     protected function alreadyLogin()
      {
         if(is_null(Session::get('user'))){
         	

         }else{
            $this ->error('请不要重复登录','index/index');
         }
         
      }


}