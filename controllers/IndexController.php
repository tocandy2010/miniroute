<?php

class IndexController extends Controller {

    public function __construct(){
        parent:: __construct();
    }

    /*
     *  首頁
     */
    public function index($reg = false)
    {
        $test = 'test';
        $this->smarty->assign('test', URL);
        $this->smarty->display('home/test.html');
    }

    /*
     *  新增頁面
     */
    public function create()
    {

    }

    /*
     *  新增處理
     */
    public function add()
    {
        echo "add";
        var_dump($this->model);
        $this->view->render("home/index");
    }

    /*
     *  修改頁面
     */
    public function edit()
    {
        echo "edit";
    }

    /*
     *  修改處理
     */
    public function update()
    {

    }

    /*
     *  刪除處裡
     */
    public function delete()
    {
        echo "delete";
    }
}
