<?php

/*
 * 簡化smarty模板
 * 自訂類繼承自Smarty,先執行一遍 父類的 __construct 以確保設定與父類相同在使用
 */
class Mysmarty extends Smarty 
{
    public function __construct(){
        parent::__construct();
        $pathstrpos = strpos(__DIR__, 'miniroute');
        $path = substr(__DIR__, 0 , $pathstrpos + 9);
        $this->settemplateDir("{$path}\\views\\");
        $this->setcompileDir("{$path}\\views\\smarty-comp");
        $this->left_delimiter = "{{"; 
        $this->right_delimiter = "}}";
    }
}
