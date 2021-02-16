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
        if (isset($_POST["title"]))
        {
            $task= new Task();

            if ($task->create($_POST))
            {
                header("Location: " . WEBROOT . "/");
            }
        }

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
                header("Location: " . WEBROOT . "/");
            }
        }
        $this->set($d);
        $this->render("/Tasks/edit");
    }

    function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $task = new Task();
        if ($task->where('id', $id)->delete())
        {
            header("Location: " . WEBROOT . "/");
        }
        echo "Lỗi không xóa được";
    }
}
?>