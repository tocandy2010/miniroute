<?php

/*
 * 網站入口文件
 */
require("./public/smraty3/smarty-3.1.33/libs/Smarty.class.php");
require('./config/path.php');

 function loadlibs($class)
 {
    require("./libs/{$class}.php");
 }

 spl_autoload_register("loadlibs");

// require('./libs/Bootstrap.php');
// require('./libs/Controller.php');
// require('./libs/Model.php');

// require('./libs/Mysmarty.php');

// require('./libs/Database.php');
// require('./libs/Session.php');

// require('./libs/View.php');

$app = new Bootstrap();
