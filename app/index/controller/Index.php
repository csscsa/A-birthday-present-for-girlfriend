<?php
namespace app\index\controller;
use app\index\common\Baseindex;

class Index extends Baseindex
{
    public function index()
    {
        $this -> isLogin();
        return $this ->view ->fetch();
    }
    public function index_11()
    {
       $this -> isLogin();
        return $this ->view ->fetch('aaaindex');
    }
     public function index_12()
    {
       $this -> isLogin();
        return $this ->view ->fetch('BirthdayCake');
    }
     public function index_13()
    {
       $this -> isLogin();
        return $this ->view ->fetch('Memories');
    }


         public function jilu()
    {
       $this -> isLogin();
        return $this ->view ->fetch('jilu');
    }
}
