<?php

class IndexController extends Controller{

    public function __construct(){
        parent:: __construct();
    }

    public function index($reg = false)
    {
        $this->view->render("home/index");
        require("models/HelpModel.php");
        $model = new HelpModel();
    }

    public function delete()
    {
        echo "delete";
    }

    public function add()
    {
        echo "add";
        $this->view->render("home/index");
    }

    public function edit()
    {
        echo "edit";
    }
}
