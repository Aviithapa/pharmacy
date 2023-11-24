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
                                         Medicine Classification</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       @if(isset($model))
                                             <form method="POST" action="{{ route('medicine-classification.update', ["medicine_classification" => $model->id]) }}">
                                                 @method('PUT')
                                        @else
                                            <form method="POST" action="{{ route('medicine-classification.store') }}">
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
                                                    <label class="form-label" for="validationCustom01">Type</label>
                                                        <select class="form-select mb-3" name="type">
                                                            <option value="{{ isset($model) ? $model->type : old('type') }}">{{ isset($model) ? $model->type : old('type') }}</option>
                                                            <option value="TYPE">Type</option>
                                                            <option value="CATEGORY">Category</option>
                                                        </select>
                                                      @if($errors->any())
                                                         {{ $errors->first('type') }}
                                                      @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Label</label>
                                                    <input type="text" class="form-control" placeholder="Label" name="label" value="{{ isset($model) ? $model->label :old('label') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('label') }}
                                                      @endif
                                                </div>
                                            </div> 
                                             
                                             <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                <div class="mb-3">
                                                        <label class="form-label" for="validationCustom01">Description </label>
                                                        <input type="textarea" class="form-control" id="validationCustom01" placeholder="Additional Description" name="description" value="{{ isset($model) ? $model->description : old('description') }}">
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