<?php

class Database extends PDO {

    private $dbtype = 'mysql';
    private $dbname = 'miniroute';
    private $host = 'locathost';
    private $account = 'root';
    private $password = '123456789';
    private $info = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_EMULATE_PREPARES, false];
    
    public function __construct() 
    {
        parent::__construct("{$this->dbtype}::host={$this->host};dbname={$this->dbname}","{$this->account}", "{$this->password}", $this->info);
    }
}