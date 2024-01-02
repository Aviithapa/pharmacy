<?php

namespace App\Http\Controllers\Admin\User;

use App\Client\FileUpload\FileUploaderInterface;
use App\Filters\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponser;
use App\Http\Requests\User\AdminUserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Mail\AdminCreateUser;
use App\Models\Medias;
use App\Models\Role;
use App\Models\User;
use App\Repositories\Media\MediaRepository;
use App\Repositories\User\UserRepository;
use App\Services\User\UserGetter;
use App\Services\User\UserUpdater;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    protected $userRepository, $userFilter;
    protected $fileUploader;
    protected $mediaRepository;

    public function __construct(
        UserRepository $userRepository,
        UserFilter $userFilter,
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository,
    ) {
        $this->userRepository = $userRepository;
        $this->userFilter = $userFilter;
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('read', $this->userRepository->getModel());
        $user = User::distinct();
        $data = $request->all();
        $this->userFilter->applyFilters($user, $data);
        $users = $user->paginate(50);
        $roles = Role::all();
        return view('admin.pages.user.index', compact('users', 'request', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.user.create', compact('roles'));
    }


    public function store(AdminUserCreateRequest $request)
    {
        $this->authorize('store', $this->userRepository->getModel());

        try {
            DB::beginTransaction();

            $data = $this->prepareUserData($request);
            $user = $this->createUser($data);

            $this->uploadLogoAndDocuments($data, $user);

            $this->attachRoleAndSendEmail($user, $data);

            DB::commit();

            session()->flash('success', 'Account has been created successfully.');
            return redirect()->route('user.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    private function prepareUserData(AdminUserCreateRequest $request)
    {
        $data = $request->all();
        $data['token'] = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $data['password'] = $this->generateRandomAlphabeticString(8);
        $data['reference'] = $data['password'];
        $data['password'] = bcrypt($data['password']);
        $data['phone_number'] = $data['token'];

        return $data;
    }

    private function createUser(array $data)
    {
        $user = $this->userRepository->create($data);

        if ($user === false) {
            session()->flash('danger', 'Oops! Something went wrong.');
            throw new Exception('User creation failed.');
        }

        return $user;
    }

    private function uploadLogoAndDocuments(array $data, $user)
    {
        if (isset($data['logo'])) {
            $this->uploadMedia($data['logo'], $user, Medias::TYPE_LOGO);
        }

        if (isset($data['documents'])) {
            foreach ($data['documents'] as $document) {
                $this->uploadMedia($document, $user, Medias::TYPE_COMPANY_DOCUMENTS);
            }
        }
    }

    private function uploadMedia($file, $user, $mediaType)
    {
        $response = $this->fileUploader->upload($file, $mediaType);
        $response['user_id'] = $user->id;
        $this->mediaRepository->create($response);
    }

    private function attachRoleAndSendEmail($user, $data)
    {
        $role = Role::where('name', $data['role'])->first();
        $user->roles()->attach($role);
        // Mail::to($user->email)->send(new AdminCreateUser($user));
    }

    public function edit($id)
    {
        $this->authorize('edit', $this->userRepository->getModel());
        $user = $this->userRepository->findById($id);
        $roles = Role::all();
        return view('admin.pages.user.edit', compact('user', 'roles'));
    }

    public function show(UserGetter $userGetter, $id)
    {
        return $userGetter->show($id);
    }

    public function destroy(UserUpdater $userUpdater, $id)
    {
        return $userUpdater->delete($id);
    }

    public function update(UserUpdateRequest $userUpdateRequest, $id)
    {
        $this->authorize('update', $this->userRepository->getModel());
        $data = $userUpdateRequest->all();
        try {
            $role = Role::where('name', $data['role'])->first();
            $user = $this->userRepository->update($data, $id);
            $this->uploadLogoAndDocuments($data, $user);
            if ($user == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $user->roles()->sync([$role->id]);
            session()->flash('success', 'Account has been updated successfully.');
            return redirect()->route('dashboard.user.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    private function generateRandomAlphabeticString($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
}
