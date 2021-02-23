<?php

namespace App\Models;
use App\Models\TaskResourceModel;

class TaskRepository
{
    protected $model;

    function __construct()
    {
        return $this->model = new TaskResourceModel();
    }

    public function add($model)
    {
       return $this->model->add($model);
    }

    public function update($id, $array)
    {
       return $this->model->update($id, $array);
    }

    public function delete(int $id)
    {
       return $this->model->delete($id);
    }

    public function getById(int $id)
    {   
        return $this->model->getById($id);
    }

    public function getAll()
    {
       return $this->model->getAll();
    }


}

?>