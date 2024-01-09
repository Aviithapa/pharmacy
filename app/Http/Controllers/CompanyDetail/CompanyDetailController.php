<?php

namespace App\Http\Controllers\CompanyDetail;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyDetail\CreateCompanyDetailRequest;
use App\Repositories\CompanyDetail\CompanyDetailRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyDetailController extends Controller
{

    protected $companyDetailRepository;

    public function __construct(
        CompanyDetailRepository $companyDetailRepository,

    ) {
        $this->companyDetailRepository = $companyDetailRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $model = $this->companyDetailRepository->findByFirst('user_id', $user->id, '=');

        return view('admin.pages.company-details.form', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCompanyDetailRequest $request)
    {
        $data = $request->all();
        try {
            $data['user_id'] = Auth::user()->id;
            $companyDetails = $this->companyDetailRepository->create($data);
            if ($companyDetails == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Company details has been added successfully.');
            return redirect()->route('supplier.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
