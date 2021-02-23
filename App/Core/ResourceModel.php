<?php 

namespace App\Core;

use App\Core\ResourceModelInterface;
use Illuminate\Database\Eloquent\Model;

class ResourceModel implements ResourceModelInterface
{
    protected $id;
    protected $model;

    public function _init(Model $model, $id, $array) 
    {
        $this->id = $id;
        $this->model = $model;  
    }

    public function add(array $array)
    {
        $this->model->create($array);
    }

    public function update(int $id, array $array)
    {
        $this->model->find($id)->update($array);
    }

    public function delete(int $id)
    {
        return $this->model->find($id)->delete();
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->find($id);
    }
}


?>