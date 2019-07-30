<?php

class Bootstrap {

    /*
     * 接收路由並且分發至 controller 下的方法
     */
    public function __construct()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        } else {
            $url = "index/index";
        }
        
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $file = "controllers/{$url[0]}Controller.php";

        if (file_exists($file)) {
            require($file);
        } else {
            require("./controllers/Error.php");
            new errors("找不到控制器&nbsp{{$file}}");
            exit;
        }

        $firstword = strtoupper(substr($url[0], 0, 1));
        $otherword = substr($url[0], 1);
        $url[0] = $firstword . '' . $otherword;

        $controllername = $url[0] . "Controller";

        $controller = new $controllername;
        $controller->loadModel($url[0]);

        if (!method_exists($controller, $url[1])) {
            require("./controllers/Error.php");
            new errors("未定義的方法&nbsp{{$url[1]}}");
            exit;
        }

        if (isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } else if (isset($url[1])) {
            $controller->{$url[1]}();
        } else {
            $controller->index();
        }
    }
}
