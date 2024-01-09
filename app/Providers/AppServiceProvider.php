<?php

namespace App\Providers;

use App\Client\FileUpload\FileUploaderInterface;
use App\Client\FileUpload\LocalFileUploader;
use App\Repositories\CompanyDetail\CompanyDetailRepository;
use App\Repositories\CompanyDetail\EloquentCompanyDetailRepository;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\EloquentCustomerRepository;
use App\Repositories\Media\EloquentMediaRepository;
use App\Repositories\Media\MediaRepository;
use App\Repositories\Medicine\EloquentMedicineRepository;
use App\Repositories\Medicine\MedicineRepository;
use App\Repositories\MedicineClassification\EloquentMedicineClassificationRepository;
use App\Repositories\MedicineClassification\MedicineClassificationRepository;
use App\Repositories\Receiving\EloquentReceivingRepository;
use App\Repositories\Receiving\ReceivingRepository;
use App\Repositories\Role\EloquentRoleRepository;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Sales\EloquentSalesRepository;
use App\Repositories\Sales\SalesRepository;
use App\Repositories\SalesItem\EloquentSalesItemRepository;
use App\Repositories\SalesItem\SalesItemRepository;
use App\Repositories\Stock\EloquentStockRepository;
use App\Repositories\Stock\StockRepository;
use App\Repositories\Supplier\EloquentSupplierRepository;
use App\Repositories\Supplier\SupplierRepository;
use App\Repositories\User\EloquentUserRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $this->app->bind(
            UserRepository::class,
            EloquentUserRepository::class
        );

        $this->app->bind(
            RoleRepository::class,
            EloquentRoleRepository::class
        );

        $this->app->bind(
            MedicineClassificationRepository::class,
            EloquentMedicineClassificationRepository::class
        );

        // Supplier Dependency Injection 
        $this->app->bind(
            SupplierRepository::class,
            EloquentSupplierRepository::class
        );

        // Medicine Dependency Injection 
        $this->app->bind(
            MedicineRepository::class,
            EloquentMedicineRepository::class
        );

        // Receiving Dependency Injection 
        $this->app->bind(
            ReceivingRepository::class,
            EloquentReceivingRepository::class
        );

        // Receiving Dependency Injection 
        $this->app->bind(
            StockRepository::class,
            EloquentStockRepository::class
        );

        //Customer Dependency Injection 
        $this->app->bind(
            CustomerRepository::class,
            EloquentCustomerRepository::class
        );

        //Sales Dependency Injection 
        $this->app->bind(
            SalesRepository::class,
            EloquentSalesRepository::class
        );

        //SalesItem Dependency Injection 
        $this->app->bind(
            SalesItemRepository::class,
            EloquentSalesItemRepository::class
        );

        $this->app->bind(
            MediaRepository::class,
            EloquentMediaRepository::class
        );

        $this->app->bind(
            FileUploaderInterface::class,
            LocalFileUploader::class
        );

        $this->app->bind(
            CompanyDetailRepository::class,
            EloquentCompanyDetailRepository::class
        );
    }
}
