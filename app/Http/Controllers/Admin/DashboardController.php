<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    protected $userRepository;

    public function __construct(
        UserRepository $userRepository,

    ) {
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        $role = Auth::user()->mainRole() ? Auth::user()->mainRole()->name : 'default';
        switch ($role) {
            case 'admin':
                return view('admin.dashboard.admin');
                break;

            default:
                return $this->view('dashboard.default');
                break;
        }
    }
}
