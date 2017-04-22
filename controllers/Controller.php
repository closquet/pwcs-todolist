<?php

namespace Controllers;


class Controller
{
    protected function checkLogin(){
        if ( !isset($_SESSION['user']) ){
            header(APP_URL);
            exit;
        }
        return true;
    }
}