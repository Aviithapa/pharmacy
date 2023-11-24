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
                                         Customer</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       @if(isset($model))
                                             <form method="POST" action="{{ route('customer.update', ["customer" => $model->id]) }}">
                                                 @method('PUT')
                                        @else
                                            <form method="POST" action="{{ route('customer.store') }}">
                                        @endif
                                        @csrf
                              
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
                                            
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->


@endsection