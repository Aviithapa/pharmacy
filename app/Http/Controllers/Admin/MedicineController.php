<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicine\CreateMedicineRequest;
use App\Http\Requests\Medicine\UpdateMedicineRequest;
use App\Repositories\Medicine\MedicineRepository;
use App\Repositories\MedicineClassification\MedicineClassificationRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    //
    protected $medicineRepository, $medicineClassificationRepository;

    public function __construct(
        MedicineRepository $medicineRepository,
        MedicineClassificationRepository $medicineClassificationRepository

    ) {
        $this->medicineRepository = $medicineRepository;
        $this->medicineClassificationRepository = $medicineClassificationRepository;
    }


    public function index(Request $request)
    {
        $this->authorize('read', $this->medicineRepository->getModel());
        $datas = $this->medicineRepository->getPaginatedList($request);
        $classification = $this->medicineClassificationRepository->getAll();
        return view('admin.pages.medicine.index', compact('datas', 'request', 'classification'));
    }

    public function create()
    {
        $this->authorize('create', $this->medicineRepository->getModel());
        $classification = $this->medicineClassificationRepository->getAll();
        return view('admin.pages.medicine.create', compact('classification'));
    }


    public function store(CreateMedicineRequest $request)
    {
        $this->authorize('store', $this->medicineRepository->getModel());
        $data = $request->all();
        try {
            $data['prescription_required'] = isset($data['prescription_required']) ? true : false;
            $data['created_by'] = Auth::user()->id;
            $medicine = $this->medicineRepository->create($data);
            if ($medicine == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Medicine  has been added successfully.');
            return redirect()->route('medicine.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $this->authorize('edit', $this->medicineRepository->getModel());
        $data = $this->medicineRepository->findById($id);
        $classification = $this->medicineClassificationRepository->getAll();
        return view('admin.pages.medicine.edit', compact('data', 'classification'));
    }

    public function update(UpdateMedicineRequest $request, $id)
    {
        $this->authorize('update', $this->medicineRepository->getModel());
        $data = $request->all();
        try {
            $data['prescription_required'] = isset($data['prescription_required']) ? true : false;
            $data['created_by'] = Auth::user()->id;
            $medicine = $this->medicineRepository->update($data, $id);
            if ($medicine == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Medicine  has been updated successfully.');
            return redirect()->route('medicine.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
