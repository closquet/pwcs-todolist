<?php

namespace Controllers;

use Models\Auth as Auth_model;

class Auth extends Controller
{
    private $model = null; //je ne crois pas que ce soit utile mais ça supprime un warning phpstorm ligne 22.
    public function __construct(){
        $this->model = new Auth_model();
    }

    public function getLogin(){
        return ['view' => 'views/getLogin.php'];
    }

    public function postLogin(){
        $_SESSION['user'] = null;
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $user = $this->model->get_user($email, $password);

        if (!$user)
        {
            header('Location: index.php?email=' . $email);
            exit;
        }
        $_SESSION['user'] = $user;
        header('location: index.php?r=tasks&a=index');
    }
}