<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;

class tasksController extends Controller
{
    function index()
    {
        $tasks = new Task();

        $d['tasks'] = $tasks->all();
        $this->set($d);
        $this->render("/Tasks/index");
    }

    function create()
    {
        $this->render("/Tasks/create");
    }

    function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $task= new Task();

        $d["task"] = $task->find($id);

        if (isset($_POST["title"]))
        {
            if ($task->where('id', $id)->update($_POST))
            {
                header("Location: " . WEBROOT);
            }
        }
        $this->set($d);
        $this->render("/Tasks/edit");
    }

    function add()
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

        $task = new Task();

        if ($task->create($_POST)) 
        {
            header("Location: " . WEBROOT);
        } else {
            echo "Lỗi không thêm được";
            die;
        }
        
    }

    function update()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $task=  Task::find($id);

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
            header("Location: " . WEBROOT . "tasks/edit?id=$task->id&&titleErr=$titleErr&&desErr=$desErr");
            die;
        }

        if ($task->where('id', $id)->update($_POST))
        {
            header("Location: " . WEBROOT);
        } else {
            echo "Lỗi không thêm được";
            die;
        }
        
    }

    function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $task = new Task();
        if ($task->where('id', $id)->delete())
        {
            header("Location: " . WEBROOT);
        }
        echo "Lỗi không xóa được";
    }
}
?>