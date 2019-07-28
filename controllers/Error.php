<?php

class errors extends Controller{

    public function __construct($errormessage){
        parent:: __construct();
        echo $errormessage;
    }
}