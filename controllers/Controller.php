<?php

namespace Controllers;


class Controller
{
    protected function check_session(){
        if ( !isset($_SESSION['user']) ){
            header('Location: ' . APP_URL);
            exit;
        }
        return true;
    }
}