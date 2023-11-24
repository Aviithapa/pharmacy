<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicineClassification\CreateMedicineClassificationRequest;
use App\Http\Requests\MedicineClassification\UpdateMedicineClassificationRequest;
use App\Repositories\MedicineClassification\MedicineClassificationRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineClassificationController extends Controller
{
    //
    protected $medicineClassificationRepository;

    public function __construct(
        MedicineClassificationRepository $medicineClassificationRepository,

    ) {
        $this->medicineClassificationRepository = $medicineClassificationRepository;
    }


    public function index(Request $request)
    {
        $this->authorize('read', $this->medicineClassificationRepository->getModel());
        $datas = $this->medicineClassificationRepository->getPaginatedList($request);
        return view('admin.pages.medicine-classification.index', compact('datas', 'request'));
    }

    public function create()
    {
        $this->authorize('create', $this->medicineClassificationRepository->getModel());
        return view('admin.pages.medicine-classification.create');
    }


    public function store(CreateMedicineClassificationRequest $request)
    {
        $this->authorize('store', $this->medicineClassificationRepository->getModel());
        $data = $request->all();
        try {
            $data['slug'] = generateSlug($data['name']);
            $data['created_by'] = Auth::user()->id;
            $medicineClassification = $this->medicineClassificationRepository->create($data);
            if ($medicineClassification == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Medicine Classification has been added successfully.');
            return redirect()->route('medicine-classification.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $this->authorize('edit', $this->medicineClassificationRepository->getModel());
        $data = $this->medicineClassificationRepository->findById($id);
        return view('admin.pages.medicine-classification.edit', compact('data'));
    }

    public function update(UpdateMedicineClassificationRequest $request, $id)
    {
        $this->authorize('update', $this->medicineClassificationRepository->getModel());
        $data = $request->all();
        try {
            $data['slug'] = generateSlug($data['name']);
            $data['created_by'] = Auth::user()->id;
            $medicineClassification = $this->medicineClassificationRepository->update($data, $id);
            if ($medicineClassification == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Medicine Classification has been updated successfully.');
            return redirect()->route('medicine-classification.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
}
