<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stock\CreateStockRequest;
use App\Http\Requests\Stock\UpdateStockRequest;
use App\Repositories\Stock\StockRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockManagementController extends Controller
{
    protected $stockRepository, $stockClassificationRepository;

    public function __construct(
        StockRepository $stockRepository,
    ) {
        $this->stockRepository = $stockRepository;
    }


    public function index(Request $request)
    {
        $this->authorize('read', $this->stockRepository->getModel());
        $datas = $this->stockRepository->getPaginatedList($request);
        return view('admin.pages.stock.index', compact('datas', 'request'));
    }

    public function create()
    {
        $this->authorize('create', $this->stockRepository->getModel());
        $classification = $this->stockClassificationRepository->getAll();
        return view('admin.pages.stock.create', compact('classification'));
    }


    public function store(CreateStockRequest $request)
    {
        $this->authorize('store', $this->stockRepository->getModel());
        $data = $request->all();
        try {
            $data['prescription_required'] = isset($data['prescription_required']) ? true : false;
            $data['created_by'] = Auth::user()->id;
            $stock = $this->stockRepository->create($data);
            if ($stock == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Stock  has been added successfully.');
            return redirect()->route('stock.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $this->authorize('edit', $this->stockRepository->getModel());
        $data = $this->stockRepository->findById($id);
        $classification = $this->stockClassificationRepository->getAll();
        return view('admin.pages.stock.edit', compact('data', 'classification'));
    }

    public function update(UpdateStockRequest $request, $id)
    {
        // $this->authorize('update', $this->stockRepository->getModel());
        $data = $request->all();
        try {
            $data['created_by'] = Auth::user()->id;
            if ($data['field'] === 'quantity') {
                $stock = $this->stockRepository->findById($id);
                $quantity = $data['value'] - $stock->quantity;
                $q['remaining_quantity'] =  $stock->remaining_quantity  +  $quantity;
                $this->stockRepository->update($q, $id);
            }
            $stock = $this->stockRepository->update([$data['field'] => $data['value']], $id);
            if ($stock == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Stock  has been updated successfully.');
            return redirect()->route('stock.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
