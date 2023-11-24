<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Medicine\MedicineRepository;
use App\Repositories\Receiving\ReceivingRepository;
use App\Repositories\Stock\StockRepository;
use App\Repositories\Supplier\SupplierRepository;
use Illuminate\Http\Request;

class InventoryManagementController extends Controller
{
    //
    protected $receivingRepository, $supplierRepository, $medicineRepository, $stockRepository;

    public function __construct(
        ReceivingRepository $receivingRepository,
        SupplierRepository $supplierRepository,
        MedicineRepository $medicineRepository,
        StockRepository $stockRepository
    ) {
        $this->receivingRepository = $receivingRepository;
        $this->supplierRepository = $supplierRepository;
        $this->medicineRepository = $medicineRepository;
        $this->stockRepository = $stockRepository;
    }


    public function index(Request $request)
    {
        // $this->authorize('read', $this->receivingRepository->getModel());
        $datas = $this->medicineRepository->getPaginatedList($request);

        $dates = $this->receivingRepository->getDistinctColumnData('received_date');
        $suppliers = $this->receivingRepository->getDistinctColumnData('supplier_id');
        return view('admin.pages.inventory.index', compact('datas', 'request', 'dates', 'suppliers'));
    }
}
