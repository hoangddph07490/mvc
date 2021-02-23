<?php

namespace App\Core;
use Illuminate\Database\Eloquent\Model;

interface ResourceModelInterface
{
    public function _init(Model $model, $id, $array);

    public function add(array $array);

    public function update(int $id, array $array);

    public function delete(int $id);

    public function getAll();

    public function getById(int $id);


}

?>