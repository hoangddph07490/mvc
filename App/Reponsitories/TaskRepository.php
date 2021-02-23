<?php

namespace App\Reponsitories;

use App\Reponsitories\BaseRepository;
use App\Models\Task;

class TaskRepository extends BaseRepository
{
    public function __construct()
    {
        $model = new Task();
        parent::__construct($model);
    }
    
} 

?>