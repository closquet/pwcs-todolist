<?php

namespace Models;

use \PDOException;

class Auth extends Model
{
    public function get_user($email, $password){
        $sql_prepare = 'SELECT * FROM users WHERE email = :email AND password = :psw LIMIT 1';
        $sql_param = [':email' => $email, ':psw' => $password];
        $fetch_mode = 'fetch';
        return $this->sql_request($sql_prepare, $sql_param, $fetch_mode);
    }
}