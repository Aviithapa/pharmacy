<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Medicine\MedicineRepository;
use App\Repositories\Sales\SalesRepository;
use App\Repositories\SalesItem\SalesItemRepository;
use App\Repositories\Stock\StockRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class SalesController extends Controller
{
    //
    protected $salesRepository, $salesItemRepository, $medicineRepository, $customerRepository, $stockRepository;

    public function __construct(
        SalesRepository $salesRepository,
        SalesItemRepository $salesItemRepository,
        MedicineRepository $medicineRepository,
        CustomerRepository $customerRepository,
        StockRepository $stockRepository
    ) {
        $this->salesRepository = $salesRepository;
        $this->salesItemRepository = $salesItemRepository;
        $this->medicineRepository = $medicineRepository;
        $this->customerRepository = $customerRepository;
        $this->stockRepository = $stockRepository;
    }


    public function index(Request $request)
    {
        // $this->authorize('read', $this->receivingRepository->getModel());
        $datas = $this->salesRepository->getPaginatedList($request);

        return view('admin.pages.sales.index', compact('datas', 'request'));
    }


    public function create()
    {

        $customers = $this->customerRepository->getAll();
        $medicines = $this->medicineRepository->getAll();
        return view('admin.pages.sales.create', compact('customers', 'medicines'));
    }


    public function edit($id)
    {
        $data = $this->salesRepository->findById($id);
        $customers = $this->customerRepository->getAll();
        $medicines = $this->medicineRepository->getAll();
        return view('admin.pages.sales.edit', compact('data', 'customers', 'medicines'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $medicine = $this->medicineRepository->findById($data['medicine_id']);
        $totalQuantity = $medicine->stock->remaining_quantity;
        if ($totalQuantity < $data['quantity']) {
            session()->flash('danger', 'Stock is less then the quantity ' . $totalQuantity . ' left only.');
            return redirect()->back()->withInput();
        }
        DB::beginTransaction();
        try {
            $medicine->stock()->decrement('remaining_quantity', $data['quantity']);
            $data['created_by'] = Auth::user()->id;
            $data['sale_date'] = Carbon::now()->format('Y-m-d');
            $data['stock_id'] = $medicine->stock->id;
            $data['amount'] = $medicine->stock->price_per_unit;
            $data['total_amount'] = $data['quantity'] * $medicine->stock->price_per_unit;
            $sales = null;
            if (isset($data['sales_id']))
                $sales = $this->salesRepository->getAll()->where('id', $data['sales_id'])->first();
            if ($sales != null) {
                $medicine = $sales->salesItem->where('stock_id', $data['stock_id'])->first();
                if ($medicine) {
                    session()->flash('danger', 'Medicine has already been added, you can modify the quantity.');
                    return redirect()->back()->withInput();
                }
                $sales->salesItem()->create($data);
                session()->flash('success', 'New Medicine  has been added successfully.');
            } else {
                $sales = $this->salesRepository->create($data);
                $sales->salesItem()->create($data);
                session()->flash('success', 'Stock  has been added successfully.');
            }
            DB::commit();
            return redirect()->route('sales.edit', ['sale' => $sales->id]);
        } catch (Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $sales = $this->salesRepository->findById($id);
            $totalAmount = 0;
            foreach ($sales->salesItem as $item)
                $totalAmount += $item->total_amount;

            $discountAmount = $totalAmount - ($totalAmount * $data['discount_percentage'] / 100);
            $data['status'] = 'sold';
            $data['discount_amount'] = $discountAmount;
            $data['total_amount'] = $totalAmount;
            $this->salesRepository->update($data, $id);
            foreach ($sales->salesItem as $item) {
                $item->update(['status' => 'sold', 'discount_percentage' => $data['discount_percentage']]);
            }
            DB::commit();
            session()->flash('success', 'Sale has been created successfully.');
            return redirect()->route('sales.print', ['id' => $id]);
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }
    public function updateQuantity(Request $request, $id)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $data['created_by'] = Auth::user()->id;
            $sales = $this->salesItemRepository->findById($id);
            $stock = $this->stockRepository->findById($sales['stock_id']);
            $medicine = $this->medicineRepository->findById($stock['medicine_id']);
            $medicine->stock()->increment('remaining_quantity', $sales['quantity']);
            $totalQuantity = $medicine->stock->remaining_quantity;
            if ($totalQuantity < $data['value']) {
                return Response::json([
                    'status' => 'error',
                    'message' => 'Stock is less than the quantity. Only ' . $totalQuantity . ' left.',
                ]);
            }
            $medicine->stock()->decrement('remaining_quantity', $data['value']);
            $total_amount = $data['value'] * $medicine->stock->price_per_unit;
            $stock = $this->salesItemRepository->update(['quantity' => $data['value'], 'total_amount' => $total_amount], $id);
            if ($stock == false) {
                return Response::json([
                    'status' => 'error',
                    'message' => 'Oops! Something went wrong.',
                ]);
            }
            DB::commit();
            return Response::json([
                'status' => 'success',
                'message' => 'Stock  has been updated successfully.',
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return Response::json([
                'status' => 'error',
                'message' => 'Oops! Something went wrong.' . $e,
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data['created_by'] = Auth::user()->id;
            $sales = $this->salesItemRepository->findById($id);
            $stock = $this->stockRepository->findById($sales['stock_id']);
            $medicine = $this->medicineRepository->findById($stock['medicine_id']);
            $medicine->stock()->increment('remaining_quantity', $sales['quantity']);
            $stock = $this->salesItemRepository->delete($id);
            if ($stock == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->route('sales.edit', ['sale' => $sales['sales_id']]);
            }
            DB::commit();
            session()->flash('success', 'Sale has been created successfully.');
            return redirect()->route('sales.edit', ['sale' => $sales['sales_id']]);
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }

    public function print($id)
    {
        $data = $this->salesRepository->findById($id);
        return view('admin.pages.sales.print', compact('data'));
    }
}
