<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreAccountModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'store_account';
    protected $primaryKey       = 'account_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];
}
