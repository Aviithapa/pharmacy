@extends('admin.layout.app')

@section('content')


                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">
                                        @if(isset($model))
                                        Edit
                                        @else
                                        Create 
                                        @endif
                                         Receiving </h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       <form method="POST" action="{{ route('receiving.store') }}">
                                       @csrf

                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6"> 
                                                <div class="mb-3">
                                                    @if(isset($model)) 
                                                        <input type="hidden" value="{{ $model->supplier_id }}"  class="form-control" name="supplier_id"/>
                                                        <input type="text" value="{{  getSupplierName($model->supplier_id) }}"  class="form-control" name="supplier"  disabled />
                                                    @else
                                                       <select class="form-select mb-3" name="supplier_id"  required>
                                                            <option value="{{ isset($model) ? $model->supplier_id : '' }}" selected>{{ isset($model) ? getSupplierName($model->supplier_id) : 'Search by supplier' }}</option>
                                                            @foreach($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                                @endforeach
                                                        </select>
                                                     @endif
                                                </div>
                                            </div>
                                        </div>
                              
                                        <div class="row"> 
                                           <div class="col-lg-4 col-md-4 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Medicine Name</label>
                                                     <select class="form-select select2" name="medicine_id" data-toggle="select2" required>
                                                        <option selected>Please Select Medicine</option>
                                                        @foreach($medicines as $medicine)
                                                            <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                                        @endforeach
                                                     </select>
                                                </div>
                                            </div> 
                                             
                                           

                                            <div class="col-lg-4 col-md-4 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01" >Expiry Date</label>
                                                    <input type="date" class="form-control" placeholder="Expiry Date" name="expiry_date" required value="{{ old('expiry_date') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('expiry_date') }}
                                                      @endif
                                                </div>
                                            </div> 

                                            <div class="col-lg-4 col-md-4 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Mfg Date</label>
                                                    <input type="date" class="form-control" placeholder="YYYY-MM-DD" name="mfg_date" required value="{{ old('mfg_date') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('expiry_date') }}
                                                      @endif
                                                </div>
                                            </div> 

                                              <div class="col-lg-4 col-md-4 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Cost price</label>
                                                    <input type="text" class="form-control" placeholder="Cost Price" name="cost_price" required value="{{  old('cost_price') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('cost_price') }}
                                                      @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-4 col-md-4 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Selling price</label>
                                                    <input type="text" class="form-control" placeholder="Selling Price" name="selling_price" required value="{{ old('selling_price') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('selling_price') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-4 col-md-4 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Price per unit</label>
                                                    <input type="text" class="form-control" placeholder="Price per unit" name="price_per_unit" required value="{{  old('price_per_unit') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('price_per_price') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Quantity</label>
                                                    <input type="text" class="form-control" placeholder="500" name="quantity" required value="{{ old('quantity') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('quantity') }}
                                                      @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Additional</label>
                                                    <input type="text" class="form-control" placeholder="500" name="addition"  value="{{ old('addition') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('addition') }}
                                                      @endif
                                                </div>
                                            </div> 
                                        </div>
                                            
                                        <button class="btn btn-primary" type="submit" style="float:right">Add Receiving</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                     <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Medicine List</h4>
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Expiry Date</th>
                                                    <th>Mfg Date</th>
                                                    <th>Cost Price</th>
                                                    <th>Selling Price</th>
                                                    <th>Quantity</th>
                                                    <th>Addition</th>
                                                    <th>Price Per Unit </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                               @if(isset($data))
                                                @foreach($data->stock as $key => $stock)
                                                <tr>
                                                  <td> {{ ++$key }}</td>
                                                    <td class="editables" contenteditable="true" data-field="email" data-name="Medicine Name" data-id="{{ $stock->id }}">{{ $stock->medicine->name }}</td>
                                                    <td class="editables" contenteditable="true" data-field="expiry_date" data-name="Expiry Date"  data-id="{{ $stock->id }}">{{ $stock->expiry_date }}</td>
                                                    <td class="editables" contenteditable="true" data-field="mfg_date" data-name="Mfg Date"  data-id="{{ $stock->id }}">{{ $stock->mfg_date }}</td>
                                                    <td class="editables" contenteditable="true" data-field="cost_price" data-name="Cost Price"  data-id="{{ $stock->id }}">{{ $stock->cost_price }}</td>
                                                    <td class="editables" contenteditable="true" data-field="selling_price" data-name="Selling Price"  data-id="{{ $stock->id }}">{{ $stock->selling_price }}</td>
                                                    <td class="editables" contenteditable="true" data-field="quantity" data-name="Quantity"  data-id="{{ $stock->id }}">{{ $stock->quantity}}</td>
                                                    <td class="editables" contenteditable="true" data-field="addition" data-name="Addition"  data-id="{{ $stock->id }}">{{ $stock->addition}}</td>
                                                    <td class="editables" contenteditable="true" data-field="addition" data-name="Price Per Unit"  data-id="{{ $stock->id }}">{{ $stock->price_per_unit}}</td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end .table-responsive-->
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>


@endsection
@push('scripts')
  <script> 
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('.editables').on('click', function() {
            $(this).attr('contenteditable', 'true');
            $(this).focus();
        });

        $('.editables').on('blur', function() {
            $(this).attr('contenteditable', 'false');
            const stockId = $(this).data('id');
            var field = $(this).data('field');
            var value = $(this).text();
            var name = $(this).data('name');

            $.ajax({
                url: '/dashboard/stock/' + stockId,
                method: 'PATCH',
                data: {
                    field: field,
                    value: value,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                      
                },
                error: function(error) {
                    console.log(error)
                     $.toast({
                            heading: 'Success',
                            text: name + ' has been updated successfully',
                            position: 'top-right',
                            loader: false,
                            bgColor: '#28a745',
                        });
                    // Handle the error
                }
            });
        });
    });
</script>

@endpush