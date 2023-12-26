<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Medicine\MedicineRepository;
use App\Repositories\Receiving\ReceivingRepository;
use App\Repositories\Stock\StockRepository;
use App\Repositories\Supplier\SupplierRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReceivingManagementController extends Controller
{
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
        $datas = $this->receivingRepository->getPaginatedList($request);
        $dates = $this->receivingRepository->getDistinctColumnData('received_date');
        $suppliers = $this->receivingRepository->getDistinctColumnData('supplier_id');
        return view('admin.pages.receiving.index', compact('datas', 'request', 'dates', 'suppliers'));
    }


    public function create()
    {
        $this->authorize('create', $this->supplierRepository->getModel());
        $suppliers = $this->supplierRepository->getAll()->where('created_by', Auth::user()->id);
        $medicines = $this->medicineRepository->getAll()->where('created_by', Auth::user()->id);
        return view('admin.pages.receiving.create', compact('suppliers', 'medicines'));
    }


    public function edit($id)
    {
        $data = $this->receivingRepository->findById($id);
        $suppliers = $this->supplierRepository->getAll()->where('created_by', Auth::user()->id);
        $medicines = $this->medicineRepository->getAll()->where('created_by', Auth::user()->id);
        return view('admin.pages.receiving.edit', compact('data', 'suppliers', 'medicines'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $data['created_by'] = Auth::user()->id;
            $data['received_date'] = Carbon::now()->format('Y-m-d');
            $data['total_amount'] = 0;
            $data['total_price'] = 0;
            $data['remaining_quantity'] = $data['quantity'] + $data['addition'];
            $receiving = $this->receivingRepository->getAll()->where('supplier_id', $data['supplier_id'])->where('received_date', $data['received_date'])->first();
            if ($receiving != null) {
                $medicine = $receiving->stock->where('medicine_id', $data['medicine_id'])->first();
                if ($medicine) {
                    session()->flash('danger', 'Medicine has already been added; you can modify the quantity.');
                    return redirect()->back()->withInput();
                }
                $receiving->stock()->create($data);
                session()->flash('success', 'Stock  has been added successfully.');
            } else {
                $uuid = Str::uuid()->toString();
                $data['ref_number'] = 'REF-' . $uuid;
                $receiving = $this->receivingRepository->create($data);
                $receiving->stock()->create($data);
                session()->flash('success', 'Stock  has been added successfully.');
            }
            DB::commit();
            return redirect()->route('receiving.edit', ['receiving' => $receiving->id]);
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
