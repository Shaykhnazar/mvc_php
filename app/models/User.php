<?php

namespace app\models;
use app\core\Model;

class User extends Model
{

    public function profile()
    {
        return $this->db->row('SELECT `username`, `email`, `id` from `users`');
    }

}
