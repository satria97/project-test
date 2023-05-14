<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportProductModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'report_product';
    protected $primaryKey       = 'report_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    public function getReportProduct() {
        $builder = $this->db->table('report_product');
        $builder->select('*');
        $builder->groupBy('tanggal');
        $query = $builder->get();
        if($query->getNumRows() > 0) {
            return $query->getResult();
        }
    }
}
