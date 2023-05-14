<?php

namespace App\Controllers;

use App\Models\ProductBrandModel;
use App\Models\ProductModel;
use App\Models\ReportProductModel;
use App\Models\StoreAccountModel;
use App\Models\StoreAreaModel;
use App\Models\StoreModel;

class Home extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->brandModel = new ProductBrandModel();
        $this->reportModel = new ReportProductModel();
        $this->storeAreaModel = new StoreAreaModel();
    }
    public function index()
    {
        $data['brand'] = $this->brandModel->findAll();
        $data['area'] = $this->storeAreaModel->getArea();
        $data['report_product'] = $this->reportModel->getReportProduct();
        $data['brand_area'] = $this->productModel->groupByBrandArea();
        $data['chart'] = $this->productModel->groupByRegion();
        return view('pages/home', $data);
    }
    public function filterView()
    {
        $area =  $this->request->getPost('area_id');
        $fromDate =  $this->request->getPost('formDate');
        $toDate = $this->request->getPost('toDate');
        $data['filter'] = $this->productModel->getDataByFilter($area, $fromDate, $toDate);
        return view('pages/product', $data);
    }
}
