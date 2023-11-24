<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\CreateSupplierRequest;
use App\Repositories\Supplier\SupplierRepository;
use Exception;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    protected $supplierRepository;

    public function __construct(
        SupplierRepository $supplierRepository,

    ) {
        $this->supplierRepository = $supplierRepository;
    }


    public function index(Request $request)
    {
        $this->authorize('read', $this->supplierRepository->getModel());
        $datas = $this->supplierRepository->getPaginatedList($request);

        return view('admin.pages.supplier.index', compact('datas', 'request'));
    }

    public function create()
    {
        $this->authorize('create', $this->supplierRepository->getModel());
        return view('admin.pages.supplier.create');
    }


    public function store(CreateSupplierRequest $request)
    {
        $this->authorize('store', $this->supplierRepository->getModel());
        $data = $request->all();
        try {
            $supplier = $this->supplierRepository->create($data);
            if ($supplier == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Supplier has been added successfully.');
            return redirect()->route('supplier.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $this->authorize('edit', $this->supplierRepository->getModel());
        $data = $this->supplierRepository->findById($id);
        return view('admin.pages.supplier.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update', $this->supplierRepository->getModel());
        $data = $request->all();
        try {
            $supplier = $this->supplierRepository->update($data, $id);
            if ($supplier == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Supplier has been updated successfully.');
            return redirect()->route('supplier.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
