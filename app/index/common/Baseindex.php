<?php
namespace app\index\common;
use think\Controller;
use think\Session;
use app\admin\common\Base;
class Baseindex extends Controller
{
      protected function _initialize(){
      	//parent:: _initialize;
      	//判断用户登录状态
      	//define('USER_ID',Session::get('user_id'));


      }

      protected function isLogin()
      {
         if(is_null(Session::get('user_id'))){
         	$this ->error('未登录，无权访问','login/index');

         }

      }
     protected function alreadyLogin()
      {
         if(!is_null(Session::get('user_id'))){
         	$this ->error('请不要重复登录','index/index');

         }
         
      }


}