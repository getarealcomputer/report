<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model{
  // Database table
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $insertID = 0;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected $protectedFields = true;
  protected $allowedFields = [
    'username',
    'password',
    'email'
  ];
  protected $createdField  = 'created_on';
}
