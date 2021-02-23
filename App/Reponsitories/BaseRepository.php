<?php
namespace App\Reponsitories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {   
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    public function add(array $array)
    {
        return $this->model->create($array);
    }

    public function update(int $id, array $array)
    {
        return $this->model->where('id', $id)->update($array);
    }

    public function delete(int $id)
    {
        return $this->model->where('id', $id)->delete();
    }
}

?>