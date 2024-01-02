<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Medicine;
use App\Models\SalesItem;
use App\Models\StockManagement;
use App\Models\User;
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
                $customerCount = $this->getCustomerCount();
                $todaySalesWithDiscount = $this->getTodaySalesWithDiscount();
                $monthlySalesWithDiscount = $this->getMonthlySalesWithDiscount();
                $percentageDifference = $this->getPercentageDifference();
                $nearToExpireMedicinesCount = $this->getMedicinesCount('expiry_date', '>=', now(), 'expiry_date', '<', now()->addDays(10), 'remaining_quantity', '<>', 0, 'created_by', '=', Auth::user()->id);
                $expiredMedicinesCount = $this->getMedicinesCount('expiry_date', '<', now(), 'remaining_quantity', '<>', 0,  'created_by', '=', Auth::user()->id);
                return view('admin.dashboard.admin', compact('customerCount', 'todaySalesWithDiscount', 'monthlySalesWithDiscount', 'percentageDifference', 'nearToExpireMedicinesCount', 'expiredMedicinesCount'));
                break;
            case 'super-admin':
                $userCount = User::count();
                $medicineCount = Medicine::count();
                return view('admin.dashboard.super-admin', compact('userCount', 'medicineCount'));
                break;
            default:
                return $this->view('dashboard.default');
                break;
        }
    }

    private function getCustomerCount()
    {
        return Customer::where('created_by', Auth::user()->id)->count();
    }

    private function getTodaySalesWithDiscount()
    {
        return $this->getSalesWithDiscount(today());
    }

    private function getMonthlySalesWithDiscount()
    {
        return $this->getSalesWithDiscount(now()->year, now()->month);
    }

    private function getSalesWithDiscount($year, $month = null)
    {
        $query = SalesItem::where('created_by', Auth::user()->id);
        if ($month !== null) {
            $query->whereYear('created_at', $year)->whereMonth('created_at', $month);
        } else {
            $query->whereDate('created_at', $year);
        }

        return $query->selectRaw('ROUND(SUM(total_amount - (total_amount * discount_percentage / 100)), 2) as total_sales_with_discount')
            ->value('total_sales_with_discount');
    }

    private function getPercentageDifference()
    {
        $lastMonthSales = $this->getMonthlySales(now()->subMonth()->year, now()->subMonth()->month);
        $thisMonthSales = $this->getMonthlySales(now()->year, now()->month);

        return ($lastMonthSales > 0) ? (($thisMonthSales - $lastMonthSales) / $lastMonthSales) * 100 : 0;
    }

    private function getMonthlySales($year, $month)
    {
        return SalesItem::where('created_by', Auth::user()->id)
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->sum('total_amount');
    }

    private function getMedicinesCount(...$conditions)
    {
        $query = StockManagement::query();

        for ($i = 0; $i < count($conditions); $i += 3) {
            $field = $conditions[$i];
            $operator = $conditions[$i + 1];
            $value = $conditions[$i + 2];

            $query->where($field, $operator, $value);
        }

        return $query->count();
    }
}
