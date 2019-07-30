<?php

$pathstrpos = strpos(__DIR__,'back');
$path = substr(__DIR__,0,$pathstrpos+4);
require_once($path."\\smarty\\smraty3\\smarty-3.1.33\\libs\\Smarty.class.php");

/*
簡化模板
目的:簡化每次都要指定路徑

1.自訂類繼承自Smarty,先執行一遍 父類的 __construct 以確保設定與父類相同
在使用
settemplateDir
setcompileDir
修改路徑
*/

class Mysmarty extends Smarty {

    public function __construct(){
        $pathstrpos = strpos(__DIR__, 'back');
        $path = substr(__DIR__, 0 , $pathstrpos + 4);
        parent::__construct();
        $this->settemplateDir("{$path}\\smarty\\smarty\\temp");
        $this->setcompileDir("{$path}\\smarty\\smarty\\comp");
    }
}



?>