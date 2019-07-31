<?php

class LoginController extends Controller{

    public function __construct(){
        parent:: __construct();
    }

    public function index($reg = false)
    {
        $this->view->render("home/login");
    }

    public function delete()
    {
        Session::init();
        echo "delete";
    }

    public function add()
    {
        echo file_get_contents("php://input"); 
        echo 123;
        exit;
        $loginInfo['account'] = $_POST['account'];
        $loginInfo['password'] = $_POST['password'];
        if ($this->model->add($loginInfo) === 1) {
            $this->view->render("home/index");
        } else {
            echo "error";
        }
    }

    public function edit()
    {
        echo "edit";
    }
}
