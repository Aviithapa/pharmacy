@extends('admin.layout.app')

@section('content')


  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">AEIRC</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pharmacy Stock Management</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                             <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-primary">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="widget-icon  bi-person-check-fill"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Total Customer</h6>
                                        <h2 class="my-2">{{ $customerCount }}</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1"></span>
                                            <span class="text-nowrap">Total number of customer</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                             <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="widget-icon bi-receipt"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Todays Sales</h6>
                                        <h2 class="my-2">Rs. {{$todaySalesWithDiscount }}</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            

                             <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-success">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon bi-receipt"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">This Month Sale</h6>
                                        <h2 class="my-2">Rs. {{  $monthlySalesWithDiscount }}</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1">{{ $percentageDifference }}%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                             
                              <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-pink">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon bi-receipt"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Near to Expire</h6>
                                        <h2 class="my-2"> {{  $nearToExpireMedicinesCount }}</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1">{{ $percentageDifference }}%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                              <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-danger">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon bi-receipt"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Expired</h6>
                                        <h2 class="my-2"> {{  $expiredMedicinesCount }}</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1">{{ $percentageDifference }}%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->


                  
                    </div>

                        

@endsection