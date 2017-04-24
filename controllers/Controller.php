<?php

namespace Controllers;


class Controller
{
    protected function check_session(){
        if ( !isset($_SESSION['user']) ){
            header('Location: index.php');
            exit;
        }
        return true;
    }
}