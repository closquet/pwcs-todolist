<?php

namespace Models;

use \PDOException;

class Tasks extends Model
{
    public function get_tasks(){
        $sql_prepare = 'SELECT * FROM tasks
                        JOIN task_user ON tasks.id = task_user.task_id
                        JOIN users ON users.id = task_user.user_id
                        WHERE users.id = :user_id';

        $sql_param = [':user_id' => $_SESSION['user']->id];
        $fetch_mode = 'fetchAll';
        return $this->sql_request($sql_prepare, $sql_param, $fetch_mode);
    }


    public function insert_task(){
        $table = 'tasks';
        $col = 'description';
        $values = '"' . $_REQUEST['description'] . '"';
        $this->insert($table, $col, $values);

        $table = 'task_user';
        $col = 'task_id, user_id';
        $values = $this->last_insert_id . ', ' . $_SESSION['user']->id;
        $this->insert($table, $col, $values);
    }
}