<?php

namespace App\Models;

use App\Core\Model;

class TaskModel extends Model
{
    protected $id;
    protected $title;
    protected $description;
    protected $created_at;
    protected $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }
}

?>