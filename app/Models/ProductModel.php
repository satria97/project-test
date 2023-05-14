<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'product';
    protected $primaryKey       = 'product_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    public function getDataByFilter($area, $fromDate,$toDate) {
        $builder = $this->db->table('product_brand');
        $builder->select('*');
        $builder->join('product', 'product.brand_id = product_brand.brand_id');
        $builder->join('report_product', 'report_product.product_id = product.product_id');
        $builder->select('SUM(report_product.compliance) / count(*) * 100 AS CountComp', false);
        $builder->join('store', 'store.store_id = report_product.store_id');
        $builder->join('store_area', 'store_area.area_id = store.area_id');
        $builder->join('store_account', 'store_account.account_id = store.account_id');
        $builder->where("report_product.tanggal BETWEEN '$fromDate' AND '$toDate'");
        $builder->where('store_area.area_id', $area);
        $query = $builder->get();
        return $query->getResult();
    }

    public function groupByRegion() {
        $builder = $this->db->table('product_brand');
        $builder->select('*');
        $builder->join('product', 'product.brand_id = product_brand.brand_id');
        $builder->join('report_product', 'report_product.product_id = product.product_id');
        $builder->select('SUM(report_product.compliance) / count(*) * 100 AS CountComp', false);
        $builder->join('store', 'store.store_id = report_product.store_id');
        $builder->join('store_area', 'store_area.area_id = store.area_id');
        $builder->join('store_account', 'store_account.account_id = store.account_id');
        $builder->groupBy('store_area.area_name');
        $query = $builder->get();
        return $query->getResult();
    }

    public function groupByBrandArea() {
        $builder = $this->db->table('product_brand');
        $builder->select('*');
        $builder->join('product', 'product.brand_id = product_brand.brand_id',);
        $builder->join('report_product', 'report_product.product_id = product.product_id',);
        $builder->select('SUM(report_product.compliance) / count(*) * 100 AS CountComp', false);
        $builder->join('store', 'store.store_id = report_product.store_id');
        $builder->join('store_area', 'store_area.area_id = store.area_id');
        $builder->join('store_account', 'store_account.account_id = store.account_id');
        $builder->groupBy('product_brand.brand_name');
        $builder->groupBy('store_area.area_name');
        $query = $builder->get();
        return $query->getResult();
    }
}
