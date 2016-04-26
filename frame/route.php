<?php
/**
 * Created by PhpStorm.
 * User: kong
 * Date: 2016/4/26
 * Time: 19:42
 */
namespace kong;

class Route {
    
    private $config;    //请求参数
    private $module;    //模块
    private $controller;//控制器
    private $action;    //方法

    public function __construct() {
        $this->getMethod();
        $this->getPath();
        $this->getConfig();
        $this->run();
    }

    //判断请求方法
    private function getMethod() {
        
        $method = $_SERVER['REQUEST_METHOD'];
        
        if($method == 'GET'){
            $this->config = $_GET;
        }else if($method == 'POST'){
            $this->config = $_POST;
        }else{
            echo "不支持的请求方法!";
            exit();
        }
        
    }

    //获取module，controller，action
    private function getPath() {
        
        if(empty($this->config['m'])){
            $this->module = 'Home';
        }else{
            $this->module = $this->config['m'];
        }
        
        if(empty($this->config['c'])){
            $this->controller = 'Index';
        }else{
            $this->controller = $this->config['c'];
        }
        
        if(empty($this->config['a'])) {
            $this->action = 'index';
        }else{
            $this->action = $this->config['a'];
        }
        
    }

    //去掉m,c,a,剩下的即为方法的参数
    private function getConfig() {
        unset($this->config['m']);
        unset($this->config['c']);
        unset($this->config['a']);
    }

    //执行
    private function run() {
        $file = './APP/'.$this->module.'/Controller/'.$this->controller.'Controller.class.php'; //文件路径
        if(file_exists($file)){ //判断文件是否存在，文件存在则控制器也存在
            require_once $file;
        }else{
            echo "控制器不存在".PHP_EOL;
            exit();
        }

        $obj = '\\'.$this->module.'\\Controller\\'.$this->controller.'Controller'; 
        if(in_array($this->action, get_class_methods($obj))) { //判断类中是否有所请求方法
            $obj = new $obj();
            call_user_func_array(array($obj, $this->action), $this->config); //传入参数，执行方法
        }else{
            echo "方法不存在<br/>";
            exit();
        }
    }
}