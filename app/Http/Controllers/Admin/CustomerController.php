<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Customer\CustomerRepository;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    protected $customerRepository;

    public function __construct(
        CustomerRepository $customerRepository,

    ) {
        $this->customerRepository = $customerRepository;
    }


    public function index(Request $request)
    {
        $this->authorize('read', $this->customerRepository->getModel());
        $datas = $this->customerRepository->getPaginatedList($request);
        return view('admin.pages.customer.index', compact('datas', 'request'));
    }

    public function create()
    {
        $this->authorize('create', $this->customerRepository->getModel());
        return view('admin.pages.customer.create');
    }


    public function store(Request $request)
    {
        $this->authorize('store', $this->customerRepository->getModel());
        $data = $request->all();
        try {
            $customer = $this->customerRepository->create($data);
            if ($customer == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'customer has been added successfully.');
            return redirect()->route('customer.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $this->authorize('edit', $this->customerRepository->getModel());
        $data = $this->customerRepository->findById($id);
        return view('admin.pages.customer.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update', $this->customerRepository->getModel());
        $data = $request->all();
        try {
            $customer = $this->customerRepository->update($data, $id);
            if ($customer == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'customer has been updated successfully.');
            return redirect()->route('customer.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
