<?php

class Controller {

    /*
     * 主控制器讓其他控制器繼承
     * 連接view
     */
    function __construct()
    {
        $this->view = new View();
    }
}