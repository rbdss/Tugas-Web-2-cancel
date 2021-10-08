<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class UnameModel extends Model
{
    protected $table = 'username';
    protected $allowedFields = ['username', 'password', 'email'];

    public function getName($useraname_id = false)
    {
        if ($useraname_id == false) {
            return $this->findAll();
        }
        return $this->where(['username_id' => $useraname_id])->first();
    }
}
