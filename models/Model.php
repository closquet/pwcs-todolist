<?php

namespace Models;

use \PDO;
use \PDOException;

class Model{
    protected function connect_db(){
        $db_config = parse_ini_file(DB_INI_FILE);
        if (!$db_config){
            die('no db connection info found');
        }

        $db_host = $db_config['DB_HOST'];
        $db_name = $db_config['DB_NAME'];
        $db_user = $db_config['DB_USER'];
        $db_pass = $db_config['DB_PASS'];

        $dsn = sprintf('mysql:dbname=%s;host=%s;charset=utf8', $db_name, $db_host);

        try {
            return new PDO($dsn, $db_user, $db_pass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]
            );
        } catch (PDOException $e) {

        }
    }

    protected function sql_request($sql_prepare, $sql_param, $fetch_mode){
        $dbh = $this->connect_db();
        if ($dbh){
            try{
                $sth = $dbh->prepare($sql_prepare);
                $sth->execute($sql_param);
                return $sth->$fetch_mode();
            }catch (PDOException $e){
                return null;
            }
        }
    }
}