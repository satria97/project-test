<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreAreaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'store_area';
    protected $primaryKey       = 'area_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    public function getArea() {
        $builder = $this->db->table('store_area');
        $builder->select('*');
        $query = $builder->get();
        if($query->getNumRows() > 0) {
            return $query->getResult();
        }
    }
}
