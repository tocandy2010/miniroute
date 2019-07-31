<?php

class Controller 
{
    /*
     * 主控制器讓其他控制器繼承
     * 連接view
     */
    function __construct()
    {
        $this->view = new View();
        $this->smarty = new Mysmarty();
    }

    /*
     * 載入Model
     */
    function loadModel($name)
    {
        $path = 'models/' . $name . 'Model.php';

        if (file_exists($path)) {
            require($path);
            $modelname = $name .'Model';
            $this->model = new $modelname;
        } else {
            require ('controllers/Error.php');
            new Error("找不到模型&nbsp{{$name}}");
            exit;
        }
    }
}
