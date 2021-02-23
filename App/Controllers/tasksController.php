<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;
use App\Models\TaskRepository;

class TasksController extends Controller
{
    protected $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository;
    }

    function index()
    {
        $d['tasks'] = $this->taskRepository->getAll();
        $this->set($d);
        $this->render("/Tasks/index");
    }

    function create()
    {
        if (isset($_POST['title'])) 
        {
            $titleErr = "";
            $desErr = "";

            if (strlen($_POST['title']) == 0) 
            {
                $titleErr = "Không để trống tiêu đề";
            }
            if ($_POST['description'] == "") 
            {
                $desErr = "Không để trống mô tả";
            }

            if ($titleErr != "" || $desErr != "")
            {
                header("Location: " . WEBROOT . "tasks/create?titleErr=$titleErr&&desErr=$desErr");
                die;
            }
            $this->taskRepository->add($_POST);
            header("Location: " . WEBROOT);
            // if ($this->taskRepository->add($_POST)) 
            // {
            //     header("Location: " . WEBROOT);
            // } else {
            //     echo "Lỗi không thêm được";
            //     die;
            // }
        }
        $this->render("/Tasks/create");
    }

    function edit($id)
    {
        $task = $this->taskRepository->getById($id);
        $d['task'] = $task;

        if (isset($_POST['title']))
        {
            $titleErr = "";
            $desErr = "";

            if ($_POST['title'] == "") 
            {
                $titleErr = "Không để trống tiêu đề";
            }
            if ($_POST['description'] == "") 
            {
                $desErr = "Không để trống mô tả";
            }

            if ($titleErr != "" || $desErr != "")
            {
                header("Location: " . WEBROOT . "tasks/edit/$task->id&&titleErr=$titleErr&&desErr=$desErr");
                die;
            }
            $this->taskRepository->update($id, $_POST);
            header("Location: " . WEBROOT);
            // if ($this->taskRepository->update($id, $_POST))
            // {
            //     header("Location: " . WEBROOT);
            // } else {
            //     echo "Lỗi không thêm được";
            //     die;
            // }
        }
        $this->set($d);
        $this->render("/Tasks/edit");
    }

    function delete($id)
    {
        $this->taskRepository->delete($id);
        header("Location: " . WEBROOT);
    }
}
?>