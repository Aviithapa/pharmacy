@extends('admin.layout.app')

@section('content')

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pharmacy Stock Management</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sales</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                         <div class="card">
                               
                                    <form action="{{  route("sales.index") }}"  method="GET" novalidate>
                                        <div class="row" style="padding: 20px 10px 0px 10px;"> 
                                            
                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">                                   
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Ref Number" name="ref_number" value="{{ isset($request) ? $request->get('ref_number') : '' }}">
                                                </div>
                                            </div> 
                                            {{-- <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                       <select class="form-select mb-3" name="date">
                                                            <option value="{{ isset($request) ? $request->date : '' }}">{{ isset($request->date) ? $request->date : 'Select Date' }}</option>
                                                            @foreach($dates as $date)
                                                            <option value="{{ $date }}">{{ $date }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6"> 
                                                <div class="mb-3">
                                                       <select class="form-select mb-3" name="supplier_id">
                                                            <option value="{{ isset($request->supplier_id) ? $request->supplier_id : '' }}" >{{ isset($request->supplier_id) ? getSupplierName($request->supplier_id) : 'Search by supplier' }}</option>
                                                         @foreach($suppliers as $supplier)
                                                            <option value="{{ $supplier }}">{{ getSupplierName($supplier) }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div> --}}
                                             
                                             
                                            <div class="col-lg-1 col-md-1 col-sm-6"> 
                                                <button class="btn btn-primary" type="submit">Search</button>
                                             </div>
                                             
                                            <div class="col-lg-1 col-md-1 col-sm-6"> 
                                                <button class="btn btn-secondary" type="reset" name="reset">Reset</button>
                                             </div>
                                        </div>
                                      
                                       
                                    </form>
                                </div>     

                     
                        <div class="row">
    
                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="{{ route('sales.create') }}" class="btn btn-primary" style="color: white;">Add New Sales </a>
                                            </div>
                                            <h5 class="header-title mb-0">Sales List</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Sale Date</th>
                                                            <th>Customer Name</th>
                                                            <th>Total Amount</th>
                                                            <th>Discount</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($datas as $key => $data)
                                                         @php
                                                            $pageRelativeIndex = ($datas->currentPage() - 1) * $datas->perPage() + ($key + 1);
                                                              @endphp
                                                            <tr>
                                                            <td>{{ $pageRelativeIndex }}</td>
                                                            <td>{{ $data->sale_date }}</td>
                                                            <td>{{ $data->customer->name }}</td>
                                                            <td>{{ $data->total_amount }}</td>
                                                            <td>{{ $data->discount_percentage }}</td>
                                                            <td>{{ $data->status }}</td>
                                                            <td>
                                                                <a href="{{ route('sales.edit', ['sale' => $data->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span>
                                                                    @if($data->status === 'sold')
                                                                        <a target="blank" href="{{ route('sales.print', ['id' => $data->id]) }}"><span class="badge bg-info-subtle text-info">Print</span>
                                                                    @endif
                                                                </a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="pagination-container">
                                                    <div class="pagination-info">
                                                        Showing {{ $datas->currentPage() }} of {{ $datas->total() }}
                                                    </div>
                                                    
                                                    <div class="pagination-links">
                                                        <div class="row" style="float: right">
                                                         
                                                                <div class="col" style="align-content: center;">
                                                                     <form action="{{ route('sales.index') }}" method="GET">
                                                                        <select name="limit" id="limit" onchange="this.form.submit()" style="height:35px; border-color:lightgrey;">
                                                                            <option value="{{ $request->get('limit') ? $request->get('limit') : 15 }}"> {{ $request->get('limit') ? $request->get('limit') : 15 }} </option>
                                                                            <option value="10">10</option>
                                                                            <option value="25">25</option>
                                                                            <option value="50">50</option>
                                                                            <option value="100">100</option>
                                                                        </select>
                                                                    </form>
                                                                </div>
                                                                <div class="col">
                                                                     {{  $datas->appends(request()->query())->links('admin.layout.pagination') }}
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>

@endsection

@push('scripts')
     <script>
    document.addEventListener('DOMContentLoaded', function () {
        const resetButton = document.querySelector('button[name="reset"]');

        resetButton.addEventListener('click', function () {
            // Redirect to the dashboard page
            window.location.href = '{{ route('sales.index') }}';
        });
    });
</script>
 







@endpush