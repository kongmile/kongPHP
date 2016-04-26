<?php
/**
 * Created by PhpStorm.
 * User: kong
 * Date: 2016/4/26
 * Time: 19:45
 */
require_once "./frame/route.php";

echo '请求方式: '.$_SERVER['REQUEST_METHOD'].'<br/>';

new \kong\route();

?>

<a href="./index.php?m=Home&&c=Index&&a=test">Home模块>Index控制器>test方法</a><br/>
<a href="./index.php?m=Home&&c=Hello&&a=hello">Home模块>Hello控制器>hello方法</a><br/>
<a href="./index.php?m=Admin&&c=Admin&&a=admin">Admin模块>Admin控制器>admin方法</a><br/>
<a href="./index.php">Home模块>Index控制器>index方法(默认)</a><br/>
错误：<br/>
<a href="./index.php?m=Home&&c=Index&&a=nothing">不存在的方法</a><br/>
<a href="./index.php?m=Home&&c=nothing&&a=hello">不存在的控制器</a><br/>
<a href="./index.php?m=hello&&c=Admin&&a=admin">不存在的模块</a><br/>



