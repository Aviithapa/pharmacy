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
                                         Medicine </h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       @if(isset($model))
                                             <form method="POST" action="{{ route('medicine.update', ["medicine" => $model->id]) }}">
                                                 @method('PUT')
                                        @else
                                            <form method="POST" action="{{ route('medicine.store') }}">
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
                                                    <label class="form-label" for="validationCustom01">Generic Name</label>
                                                    <input type="text" class="form-control" placeholder="Generic Name" name="generic_name" required value="{{ isset($model) ? $model->generic_name : old('generic_name') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('generic_name') }}
                                                      @endif
                                                </div>
                                            </div> 
                                              <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">SKU</label>
                                                    <input type="text" class="form-control" placeholder="SKU" name="sku" required value="{{ isset($model) ? $model->sku : old('sku') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('sku') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Measurement</label>
                                                    <input type="text" class="form-control" placeholder="500mg" name="measurement" required value="{{ isset($model) ? $model->measurement : old('measurement') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('measurement') }}
                                                      @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Type</label>
                                                        <select class="form-select mb-3" name="type_id">
                                                            <option value="{{ isset($model) ? $model->type_id : old('type_id') }}">{{ isset($model) ? $model->type->name : old('type_id') }}</option>
                                                            @foreach($classification->where('type','TYPE') as $data)
                                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                            @endforeach
                                                        </select>
                                                      @if($errors->any())
                                                         {{ $errors->first('type_id') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Category</label>
                                                        <select class="form-select mb-3" name="category_id">
                                                            <option value="{{ isset($model) ? $model->category_id : old('category_id') }}">{{ isset($model) ? $model->category->name : old('category_id') }}</option>
                                                            @foreach($classification->where('type','CATEGORY') as $data)
                                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                            @endforeach
                                                        </select>
                                                      @if($errors->any())
                                                         {{ $errors->first('category_id') }}
                                                      @endif
                                                </div>
                                            </div> 
                                          
                                             <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                <div class="mb-3">
                                                    <input type="checkbox" class="form-check-input" name="prescription_required" id="customCheckcolor1" {{ (isset($model) && $model->prescription_required) ? 'checked' : '' }}>
                                                    <label class="form-label" for="validationCustom01">Medicine Requires Prescription </label>
                                                        @if($errors->has('prescription_required'))
                                                            <div class="text-danger">{{ $errors->first('prescription_required') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                            </div>
                                             <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                <div class="mb-3">
                                                        <label class="form-label" for="validationCustom01">Description </label>
                                                        <textarea  class="form-control"  rows="5" id="validationCustom01" placeholder="Additional Description" name="description" value="{{ isset($model) ? $model->description : old('description') }}" > </textarea>
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