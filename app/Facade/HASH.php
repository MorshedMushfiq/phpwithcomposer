<?php
namespace App\Facade;

trait HASH {
    public function make($pass){
        return password_hash($pass, PASSWORD_DEFAULT);
    }
}




?>