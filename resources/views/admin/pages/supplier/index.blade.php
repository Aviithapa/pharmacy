@extends('admin.layout.app')

@section('content')

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pharmacy Management System</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Supplier</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Supplier! </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                         <div class="card">
                               
                                    <form action="{{  route("supplier.index") }}"  method="GET" novalidate>
                                        <div class="row" style="padding: 20px 10px 0px 10px;"> 
                                            
                                            <div class="col-lg-5 col-md-5 col-sm-6"> 
                                                <div class="mb-3">                                   
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="name" value="{{ isset($request) ? $request->get('name') : '' }}">
                                                </div>
                                            </div>      
                                              <div class="col-lg-5 col-md-5 col-sm-6"> 
                                                <div class="mb-3">
                                                         <input type="text" class="form-control" id="validationCustom01" placeholder="Email" name="email" value="{{ isset($request) ? $request->get('email') : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-6"> 
                                                <button class="btn btn-primary" type="submit" style="width:110%">Search</button>
                                             </div>
                                             
                                            <div class="col-lg-1 col-md-1 col-sm-6"> 
                                                <button class="btn btn-danger" type="reset" name="reset">Reset</button>
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
                                                <a href="{{ route('supplier.create') }}" class="btn btn-primary" style="color: white;">Add New Supplier</a>
                                            </div>
                                            <h5 class="header-title mb-0">Supplier List</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Company Name</th>
                                                            <th>Contact Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Pan/Vat Number</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($datas as $key => $data)
                                                         @php
                                                            $pageRelativeIndex = ($datas->currentPage() - 1) * $datas->perPage() + ($key + 1);
                                                              @endphp
                                                            <tr>
                                                            <td>{{ $pageRelativeIndex }}</td>
                                                            <td>{{ $data->name }}</td>
                                                            <td>{{ $data->contact_name }}</td>
                                                            <td>{{ $data->email }}</td>
                                                            <td>
                                                                {{ $data->phone }}
                                                            </td>
                                                            <td>
                                                              {{ $data->pan_number }}
                                                            </td>
                                                            <td><a href="{{ route('supplier.edit', ['supplier' => $data->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                                                            {{-- <form id="delete-form-{{ $data->id }}" action="{{ route('medicine-classification.destroy', ['medicine_classification' => $data->id]) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $data->id }}').submit();">
                                                                <span class="badge bg-danger-subtle text-danger">Delete</span>
                                                            </a> --}}
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                  <div class="pagination-container">
                                                    <div class="pagination-info">
                                                        Showing {{ $datas->perPage() }} of {{ $datas->total() }}
                                                    </div>
                                                    
                                                    <div class="pagination-links">
                                                        <div class="row" style="float: right">
                                                         
                                                                <div class="col" style="align-content: center;">
                                                                     <form action="{{ route('supplier.index') }}" method="GET">
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
            window.location.href = '{{ route('supplier.index') }}';
        });
    });
</script>
 







@endpush