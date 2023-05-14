<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductBrandModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'product_brand';
    protected $primaryKey       = 'brand_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

}
