<?php
/**
 * Created by PhpStorm.
 * User: kong
 * Date: 2016/4/26
 * Time: 19:44
 */
namespace Home\Controller;

class IndexController {
    
    function index() {
        echo '你现在访问的是 Home模块>Index控制器>index方法<br/>';
    }

    function test() {
        echo '你现在访问的是 Home模块>Index控制器>test方法<br/>';
    }
}