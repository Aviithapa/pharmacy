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
                                         Sales </h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form id="customer-add" action="#" method="post">
                                                <div class="row"> 
                                                
                                                    <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                        <div class="mb-3">
                                                            <label class="form-label" for="validationCustom01">Name</label>
                                                            <input type="text" class="form-control" placeholder="Name" name="name" required value="{{ isset($model) ? $model->name : old('name') }}">
                                                            @if($errors->any())
                                                                {{ $errors->first('name') }}
                                                            @endif
                                                        </div>
                                                    </div> 
                                                    <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                        <div class="mb-3">
                                                            <label class="form-label" for="validationCustom01">Email</label>
                                                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ isset($model) ? $model->email : old('email') }}">
                                                            @if($errors->any())
                                                                {{ $errors->first('email') }}
                                                            @endif
                                                        </div>
                                                    </div> 
                                                    <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                        <div class="mb-3">
                                                            <label class="form-label" for="validationCustom01">Phone Number</label>
                                                            <input type="text" class="form-control" id="validationCustom01"  name="phone" value="{{ isset($model) ? $model->phone : old('phone') }}">
                                                        @if( $errors->first('phone'))
                                                                    <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                        {{ $errors->first('phone') }}
                                                                    </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                        <div class="mb-3">
                                                            <label class="form-label" for="validationCustom01">Address</label>
                                                            <input type="text" class="form-control" id="validationCustom01"  name="address" value="{{ isset($model) ? $model->address : old('address') }}">
                                                        @if( $errors->first('address'))
                                                                    <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                        {{ $errors->first('address') }}
                                                                    </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                        <div class="mb-3">
                                                                <label class="form-label" for="validationCustom01">Description </label>
                                                                <textarea  class="form-control"  rows="5" id="validationCustom01" placeholder="Additional Description" name="description" value="" > {{ isset($model) ? $model->description : old('description') }}</textarea>
                                                                @if($errors->any())
                                                                    {{ $errors->first('description') }}
                                                                @endif
                                                            </div>
                                                    </div>
                                                </div>
                                            <button class="btn btn-primary" type="submit">Add Customer</button>
                                            </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    <div id="new-customer-form" style="display: none;">
                                            <!-- Add form fields for the new customer -->
                                            
                                        </div>
                                       <form method="POST" action="{{ route('sales.store') }}">
                                       @csrf

                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6"> 
                                                <div class="mb-3">
                                                    @if(isset($model)) 
                                                        <input type="hidden" value="{{ $model->customer_id }}"  class="form-control" name="customer_id"/>
                                                        <input type="hidden" value="{{ $model->id}}"  class="form-control" name="sales_id"/>

                                                        <input type="text" value="{{  $model->customer->name }}"  class="form-control" name="customer"  disabled />
                                                    @else
                                                       <select class="form-select mb-3" name="customer_id"  required>
                                                            <option value="{{ isset($model) ? $model->customer_id : '' }}" selected>{{ isset($model) ? getSupplierName($model->customer_id) : 'Search Customer' }}</option>
                                                            @foreach($customers as $customer)
                                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                                @endforeach
                                                                <option value="new">Add New Customer</option>
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
                                                    <label class="form-label" for="validationCustom01">Quantity</label>
                                                    <input type="text" class="form-control" placeholder="500" name="quantity" required value="{{ old('quantity') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('quantity') }}
                                                      @endif
                                                </div>
                                            </div> 
                                        </div>
                                            
                                        <button class="btn btn-primary" type="submit" style="float:right">Add Medicine</button>
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
                                                    <th>Quantity</th>
                                                    <th>Price Per Item</th>
                                                    <th>Total</th>
                                                    <th>Action </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                               @if(isset($data))
                                                @foreach($data->salesItem as $key => $salesItem)
                                                <tr>
                                                  <td> {{ ++$key }}</td>
                                                    <td data-field="email" data-name="Medicine Name" data-id="{{ $salesItem->id }}">{{ $salesItem->stock->medicine->name }}</td>
                                                    <td data-field="expiry_date" data-name="Expiry Date"  data-id="{{ $salesItem->id }}">{{ $salesItem->stock->expiry_date }}</td>
                                                    <td data-field="mfg_date" data-name="Mfg Date"  data-id="{{ $salesItem->id }}">{{ $salesItem->stock->mfg_date }}</td>
                                                    <td  class="editables" contenteditable="true" data-field="quantity" data-name="Quantity"  data-id="{{ $salesItem->id }}">{{ $salesItem->quantity}}</td>
                                                    <td data-field="price_per_unit" data-name="Price Per Unit"  data-id="{{ $salesItem->id }}">{{ $salesItem->stock->price_per_unit }}</td>
                                                    <td data-field="total" data-name="Total"  data-id="{{ $salesItem->id }}">{{ $salesItem->total_amount}}</td>
                                                    <td>
                                                        <form action="{{ url('/dashboard/sales/' . $salesItem->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                         <div class="pagination-container">
                                                    
                                                    
                                                    <div class="pagination-links">
                                                        <div class="row" style="float: right">
                                                            @if(isset($model))
                                                                <div class="col" style="align-content: center;">
                                                                  
                                                                        <form action="{{ route('sales.update', ['sale' => $model->id]) }}" method="POST">
                                                                            @method('PUT')
                                                                                @csrf
                                        
                                                                   
                                                                        <div class="row"> 
                                                                            <input type="text" class="form-control" placeholder="Discount" name="discount_percentage" required value="{{ isset($model) ? $model->discount_percentage : old('discount_percentage') }}">
                                                                            <button class="btn btn-primary" type="submit" style="float:right; margin-top:20px">Checkout</button>
                                                                      </div>
                                                                    </form>
                                                                </div>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
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

    // When the "Add New Customer" option is selected
    $('select[name="customer_id"]').change(function() {
        if ($(this).val() === "new") {
            $('.modal').addClass('show');
            $('.modal').css({
                display: 'block',
                background: 'rgba(0, 0, 0, 0.5)'
            });
        } else {
             $('.modal').removeClass('show');
             $('.modal').css({
                display: 'none',
                background: 'rgba(0, 0, 0, 0.5)'
            });
             $('#customer_id').val('');
        }
    });
    $('.btn-close').click(function() {
       $('.modal').removeClass('show');
             $('.modal').css({
                display: 'none',
                background: 'rgba(0, 0, 0, 0.5)'
            });
    window.location.href = '{{ route('sales.create') }}';
    });

   

            $(document).ready(function() {
            $('#customer-add').submit(function(e) {
                e.preventDefault();

                // Serialize the form data and send it via AJAX
                var formData = $(this).serializeArray();
                console.log(formData);

                $.ajax({
                    type: 'POST',
                    url: '/dashboard/customer',
                    data: formData,
                    success: function(response) {
                        $.toast({
                            heading: 'Success',
                            text: 'New customer has been added successfully',
                            position: 'top-right',
                            loader: false,
                            bgColor: '#28a745',
                        });
                        window.location.href = '{{ route('sales.create') }}';
                    },
                    error: function(error) {
                        // Handle the error response
                        console.error('Error: ' + error);
                    }
                });
            });
        });

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
                        url: '/dashboard/sales/quantity/update/' + stockId,
                        method: 'PUT',
                        data: {
                            field: field,
                            value: value,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if(response.status === 'error'){
                                $.toast({
                                    heading: 'Error',
                                    text: response.message,
                                    position: 'top-right',
                                    loader: false,
                                    bgColor: 'red',
                                });
                            }else if(response.status === 'success'){
                                $.toast({
                                    heading: 'Success',
                                    text: response.message,
                                    position: 'top-right',
                                    loader: false,
                                    bgColor: '#28a745',
                                });
                            }
                            
                            
                        },
                        error: function(error) {
                            console.log(error, 'this is error')
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

            const exampleModal = document.getElementById('exampleModal')
            exampleModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const recipient = button.getAttribute('data-bs-whatever')
                const modalButton = exampleModal.querySelector('.modal-body .delete');
                modalButton.setAttribute('data-id', recipient);
            })

           const handleDelete = () =>{
                 const modalBodyInput = exampleModal.querySelector('.modal-body .delete')
                 const sale = modalBodyInput.getAttribute('data-id')
                  $.ajax({
                    url: '/dashboard/sales/' + sale,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if(response.status === 'error'){
                            $.toast({
                                heading: 'Error',
                                text: response.message,
                                position: 'top-right',
                                loader: false,
                                bgColor: 'red',
                                afterHidden: function() {
                                    window.location.reload();
                                }
                            });
                        }else if(response.status === 'success'){
                            $.toast({
                                heading: 'Success',
                                text: response.message,
                                position: 'top-right',
                                loader: false,
                                bgColor: '#28a745',
                                afterHidden: function() {
                                        window.location.reload();
                                    }
                                });
                        }
                         window.location.reload();
                    },
                    error: function(error) {
                        // Handle the error.
                    }
                });
            }

        
        </script>

@endpush