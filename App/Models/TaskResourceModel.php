<?php

namespace App\Models;

use App\Core\ResourceModel;
use App\Models\Task;

class TaskResourceModel extends ResourceModel
{
    function __construct()
    {
        parent::_init(new Task, $id = null, $array = []);
    }
}

?>