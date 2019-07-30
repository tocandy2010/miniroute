<?php

class Model {

    protected $table = null;
    protected $pk = null;

    public function __construct()
    {
        $this->db = new Database();
    }
    
}
