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
                                         Company Details</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                      
                                            <form method="POST" action="{{ route('company-details.store') }}" enctype="multipart/form-data">
                    
                                        @csrf
                              
                                        <div class="row"> 
                                         
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Company Name</label>
                                                    <input type="text" class="form-control" placeholder="Company Name" name="company_name"  required value="{{ isset($model) ? $model->company_name :old('company_name') }}" @disabled(isset($model))>
                                                      @if($errors->any())
                                                         {{ $errors->first('company_name') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Company Type</label>
                                                        <select class="form-select mb-3" name="company_type" @disabled(isset($model))>
                                                           <option value={{ isset($model) ? $model->company_type : old('company_type') }}>{{ isset($model) ? $model->company_type : old('company_type') }}</option>
                                                           <option value="VAT">VAT</option>
                                                           <option value="PAN">PAN</option>
                                                        </select>
                                                      @if($errors->any())
                                                         {{ $errors->first('company_type') }}
                                                      @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Vat / Pan Number</label>
                                                    <input type="text" class="form-control" placeholder="Vat / Pan Number" name="company_registration_number"  required value="{{ isset($model) ? $model->company_registration_number :old('company_registration_number') }}" @disabled(isset($model))>
                                                      @if($errors->any())
                                                         {{ $errors->first('company_registration_number') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Email </label>
                                                    <input type="email" class="form-control" id="validationCustom01" placeholder="email" name="email"  required value="{{ isset($model) ? $model->email : old('email') }}" @disabled(isset($model))>
                                                     @if($errors->any())
                                                         {{ $errors->first('email') }}
                                                      @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Address</label>
                                                    <input type="text" class="form-control" placeholder="address" name="address"  required value="{{ isset($model) ? $model->address :old('address') }}" @disabled(isset($model))>
                                                      @if($errors->any())
                                                         {{ $errors->first('address') }}
                                                      @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Phone Number</label>
                                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone_number"  required value="{{ isset($model) ? $model->phone_number :old('phone_number') }}" @disabled(isset($model))>
                                                      @if($errors->any())
                                                         {{ $errors->first('phone_number') }}
                                                      @endif
                                                </div>
                                            </div> 
                                           
                                             
                                             
                                            
                                             
                                        </div>
                                       @if(isset($model))
                                        
                                       @else
                                        <button class="btn btn-primary" type="submit" style="margin-top: 10px; ">Submit form</button>
                                      @endif
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->


@endsection