<?php

namespace app\Index\controller;
header("Content-type:text/html;charset=utf-8");
use app\index\common\Baseindex;
use think\Request;
use think\Session;
class Liuyan extends Baseindex
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

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function liuyan()
    {

    $servername = "localhost"; //自己的服务器地址
    $username = "root"; // 自己的数据库名称
    $userpwd = "1122"; //数据库密码
    $mydb = "admin"; //数据库名字

    $conn = mysqli_connect($servername,$username,$userpwd,$mydb);

    if($conn->connect_error){
        die("链接失败:". $conn->connect_error);
    }
    mysqli_query($conn,"set names utf8");
    $act = $_GET["act"];
    $PAGE_SIZE = 1000; //一页显示条数
    
    switch ($act) {
        case 'add':
            $nam =Session::get('user_id');
            $content = urldecode($_GET["content"]);
            $time = time();
            $content = str_replace("\n", "", $content);
            $sql = "INSERT INTO myguests (id,content,reg_date,acc,ref,nam) VALUES (0,'{$content}',{$time},0,0,'".$nam."')";
            // mysqli_query($conn,$sql);
            if (mysqli_query($conn, $sql)) {
                // echo "新记录插入成功";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            $res = mysqli_query($conn,'SELECT LAST_INSERT_ID()'); //id自增
            $row = mysqli_fetch_array($res);
            $id = (int)$row[0];
            echo "{\"error\":0,\"id\":{$id},\"time\":{$time}}";
            break;
        case 'get_page_count':
            $sql = "SELECT COUNT(*) FROM myguests";
            $res = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($res);
            $count = ceil($row[0]/$PAGE_SIZE);
            echo "{\"count\":{$count}}";
            break;
        case 'get':
            $page = (int)$_GET['page'];
            if($page<1) $page=1;
            $s = ($page-1)*$PAGE_SIZE;
            $sql ="SELECT id,content,reg_date,acc,ref,nam FROM myguests ORDER BY reg_date DESC LIMIT {$s},{$PAGE_SIZE}";
            $res = mysqli_query($conn,$sql);
            $listArr = array();
            while ($row = mysqli_fetch_array($res)) {
                $arr = array();
                array_push($arr, '"id":'.$row[0]);
                array_push($arr, '"content":"'.$row[1].'"');
                array_push($arr, '"reg_date":'.$row[2]);
                array_push($arr, '"acc":'.$row[3]);
                array_push($arr, '"ref":'.$row[4]);

                array_push($listArr,implode(",", $arr));

                // $sql ="SELECT nam FROM myguests WHERE}";
            }

            if(count($listArr)>0){
                echo '[{'.implode('},{', $listArr).'}]';
            }else{
                echo '[]';
            }
            break;
        case "acc":
            $id = (int)$_GET['id'];
            // $sql = "SELECT acc FROM myguests WHERE id={$id}";
            // $res = mysqli_query($conn,$sql);
            // $row = mysqli_fetch_array($res);
            // $newacc = (int)$row[0]+1;
            $newacc = (int)$_GET['num'];
            $sql2 = "UPDATE myguests SET acc={$newacc} WHERE id={$id}";
            mysqli_query($conn,$sql2);
            echo '{"error":0}';
            break;
        case "ref":
            $id = (int)$_GET['id'];
            // $sql = "SELECT ref FROM myguests WHERE id={$id}";
            // $res = mysqli_query($conn,$sql);
            // $row = mysqli_fetch_array($res);
            // $newacc = (int)$row[0]+1;
            $newacc = (int)$_GET['num'];
            $sql2 = "UPDATE myguests SET ref={$newacc} WHERE id={$id}";
            mysqli_query($conn,$sql2);
            echo '{"error":0}';
            break;
        case 'del':
            $id = (int)$_GET['id'];
            $sql = "DELETE FROM myguests WHERE id={$id}";
            mysqli_query($conn,$sql);
            echo '{"error":0}';
            break;
    }
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
        //
    }
}
