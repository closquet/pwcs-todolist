<?php

namespace Controllers;

use Models\Tasks as Tasks_model;

class Tasks extends Controller
{
    private $model = null;
    public function __construct(){
        $this->model = new Tasks_model();
    }

    public function index(){
        $this->check_session();
        $tasks = $this->model->get_tasks();
        return ['view' => 'views/tasksIndex.php', 'tasks' => $tasks];
    }


    public function create(){
        $this->check_session();
        $this->model->insert_task();
        header('location: index.php?r=tasks&a=index');
    }
}