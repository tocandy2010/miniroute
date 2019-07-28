<?php

class View {
    
    public function __construct() 
    {
        // echo "this is vaiw";
    }

    public function render($name) 
    {
        require("views/home/header.php");
        require("views/" . $name . ".php");
        require("views/home/footer.php");
    }
}
