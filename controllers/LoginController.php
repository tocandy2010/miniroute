<?php

class LoginController extends Controller{

    public function __construct(){
        parent:: __construct();
    }

    public function index($reg = false)
    {
        echo  $this->model->test();
        $a = false;
        if ($a === true) {
            Session::init();
            Session::set('login',true);
            echo 789;
            exit;
        } else {
            header("location: ./add");
            exit;
        }

        $this->view->render("home/login");
        Session::destroy();
    }

    public function delete()
    {
        Session::init();
        echo "delete";
    }

    public function add()
    {
        echo "add";
        var_dump($this->model);
        $this->view->render("home/index");
    }

    public function edit()
    {
        echo "edit";
    }
}
