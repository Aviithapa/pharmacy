@extends('admin.layout.app')

@section('content')
  <style type="text/css" media="print">
    /* Define the styles for printing */
    @page {
        size: auto; /* Default page size */
        margin: 0; /* No margin for the page */
    }
    body {
        margin: 0; /* No margin for the body */
        background: white;
    }
    .print-section {
        margin: 20px;
        /* Define the styles for the section you want to print */
        /* You can hide other elements by setting display: none; */
    }
    table, th, td {
    border: 1px solid  #dee2e6;
    /* text-align: center */
    }
</style>
<style> 

 table, th, td {
    border: 1px solid #dee2e6;
    text-align: center
    }
</style>
    
    <div class="row print-section">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <!-- Invoice Logo-->
                                        <div class="clearfix">
                                            <div class="float-center mb-3" style="text-align: center;">
                                                <h2>{{ isset($companyDetails)  ? $companyDetails->company_name : 'Pharmacy Invoice' }}</h2>
                                                <h3>{{ isset($companyDetails)  ? $companyDetails->address : 'Pharmacy Address' }} </h3>
                                                <h4>Email : {{ isset($companyDetails)  ? $companyDetails->email : 'Pharmacy Email' }} </h4>
                                                <h5>Phone Number : {{ isset($companyDetails)  ? $companyDetails->phone_number : 'Pharmacy Number' }} </h5>

                                             </div>
                                            <div class="flex">
                                                <div class="float-right">
                                                      @if(isset($companyDetails))
                                                    <strong class="bold">{{$companyDetails->company_type === 'VAT' ? 'VAT' : 'PAN'  }} : {{ $companyDetails->company_registration_number }}</strong> <br/>
                                                    <p class="fs-13"><strong>Invoice Number: </strong> <span>{{ $data->id }}</span></p>
                                                    @endif
                                                </div>
                                                <div class="float-end">
                                                    <h4 class="m-0 d-print-none">Invoice</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Invoice Detail-->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="float-start mt-3">
                                                 
                                                    <p><b>Hello, {{ $data->customer->name }}</b></p>
                                                    <p class="text-muted fs-13">Please find .</p>
                                                </div>
            
                                            </div><!-- end col -->
                                            <div class="col-sm-4 offset-sm-2">
                                                <div class="mt-3 float-sm-end">
                                                    <p class="fs-13"><strong>Order Date: </strong> &nbsp;&nbsp;&nbsp; {{ $data->sale_date }}</p>
                                                    <p class="fs-13"><strong>Order Status: </strong> <span class="badge bg-success float-end">{{ $data->status }}</span></p>
                                                    <p class="fs-13"><strong>Order ID: </strong> <span class="float-end">{{ $data->id }}</span></p>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->
            
                                        <div class="row mt-4">
                                            <div class="col-6">
                                               
                                            </div> <!-- end col-->
                                        </div>    
                                        <!-- end row -->        
    
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-centered table-hover table-borderless mb-0 mt-3">
                                                        <thead class="border-top border-bottom bg-light-subtle border-light">
                                                        <tr><th>#</th>
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th class="text-center">Total</th>
                                                        </tr></thead>
                                                        <tbody style="border: 1px solid black;">
                                                         @foreach($data->salesItem as $key => $salesItem)
                                                        <tr>
                                                    <td> {{ ++$key }}</td>
                                                    <td data-field="email" data-name="Medicine Name" data-id="{{ $salesItem->id }}"><b>{{ $salesItem->stock->medicine->name }}</b>
                                                    <br/>
                                                               {{ $salesItem->stock->medicine->measurement }} {{ $salesItem->stock->expiry_date }}</td>
                                                
                                                    <td  class="editables" contenteditable="true" data-field="quantity" data-name="Quantity"  data-id="{{ $salesItem->id }}">{{ $salesItem->quantity}}</td>
                                                    <td data-field="price_per_unit" data-name="Price Per Unit"  data-id="{{ $salesItem->id }}">{{ $salesItem->stock->price_per_unit }}</td>
                                                    <td data-field="total" data-name="Total"  data-id="{{ $salesItem->id }}" class="text-center">{{ $salesItem->total_amount}}</td>
                                                        </tr>
                                                        
                                                        @endforeach
                                                        
                                                    
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end table-responsive-->
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="clearfix pt-3">
                                                    {{-- <h6 class="text-muted fs-14">Notes:</h6>
                                                    <small>
                                                        All accounts are to be paid within 7 days from receipt of
                                                        invoice. To be paid by cheque or credit card or direct payment
                                                        online. If account is not paid within 7 days the credits details
                                                        supplied as confirmation of work undertaken will be charged the
                                                        agreed quoted fee noted above.
                                                    </small> --}}
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-sm-5">
                                                <div class="mt-5 mt-sm-0 fs-18 mr-5" style="margin-top: 20px;">
                                                    <p><b>Sub-total:</b> <span class="float-end">{{ $data->total_amount  }}</span></p>
                                                    <p><b>Discount:</b> <span class="float-end">{{ $data->discount_percentage  }} %</span></p>
                                           
                                                    <h3><b>Total Amount:</b><span class="float-end"> Rs. {{ $data->discount_amount}}</span></h3>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->
    
                                        <div class="float-end" style="margin-top:80px;">
                                            <div style="border-top: 1px dashed black;"> </div>
                                           <underline> Prepared By </underline>
                                        </div>
                                        <div class="d-print-none mt-4">
                                            <div class="text-center">
                                                <a href="javascript:window.print()" class="btn btn-primary"><i class="bi-print"></i> Print</a>
                                            </div>
                                        </div>   
                                        <!-- end buttons -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card -->
                            </div> <!-- end col-->
                        </div>

                        @endsection


                        @push('scripts')
<script>
    // Wait for the DOM to be ready
    document.addEventListener("DOMContentLoaded", function () {
        // Find the "Print" button by its ID
        window.onload = function () {
            window.print();
        };
    });
</script>

@endpush