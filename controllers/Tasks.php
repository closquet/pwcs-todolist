<?php

namespace Controllers;

use Models\Tasks as Tasks_model;

class Tasks extends Controller
{
    public function __construct(){
        $this->model = new Tasks_model();
    }

    public function index(){
        $this->check_session();
        $tasks = $this->model->get_tasks();
        return ['view' => 'views/tasksIndex.php', 'tasks' => $tasks];
    }
}