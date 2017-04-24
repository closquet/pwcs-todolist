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


    public function getLogout(){
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('location: index.php');
    }
}