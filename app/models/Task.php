<?php

namespace app\models;
use app\core\Model;

class Task extends Model
{
    /**
     * @var string[]
     */
    public static $STATUS = [
        'new' => 'New',
        'done' => 'Done',
        'old' => 'Old',
    ];

    /**
     * Get tasks
     * @return array
     */
    public function getTasks(): array
    {
        return $this->db->row('SELECT `name`, `email`, `body`, `status` from `tasks`');
    }

}
