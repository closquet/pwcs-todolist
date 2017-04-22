<?php

namespace Controllers;

use Models\Auth as AuthModel;

class Auth extends Controller
{
    public function getLogin(){
        return ['view' => 'views/getLogin.php'];
    }

    public function postLogin(){
        $_SESSION['user'] = null;
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $authModel = new AuthModel();
        $user = $authModel->checkUser($email, $password);

        if (!$user)
        {
            header(APP_URL);
            exit;
        }

    }
}