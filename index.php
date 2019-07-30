<?php

/*
 * 網站入口文件
 */

require('./libs/Bootstrap.php');
require('./libs/Controller.php');
require('./libs/Model.php');

require('./libs/Database.php');
require('./libs/Session.php');

require('./libs/View.php');
require('./config/path.php');

$app = new Bootstrap();
