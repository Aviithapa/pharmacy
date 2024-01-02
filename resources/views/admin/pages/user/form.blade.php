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
                                         User</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       @if(isset($model))
                                             <form method="POST" action="{{ route('user.update', ["user" => $model->id]) }}" enctype="multipart/form-data">
                                                 @method('PUT')
                                        @else
                                            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                        @endif
                                        @csrf
                              
                                        <div class="row"> 
                                         
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Name</label>
                                                    <input type="text" class="form-control" placeholder="Name" name="name"  required value={{ isset($model) ? $model->name :old('name') }}>
                                                      @if($errors->any())
                                                         {{ $errors->first('name') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Email </label>
                                                    <input type="email" class="form-control" id="validationCustom01" placeholder="email" name="email"  required value={{ isset($model) ? $model->email : old('email') }}>
                                                     @if($errors->any())
                                                         {{ $errors->first('email') }}
                                                      @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Position</label>
                                                    <input type="text" class="form-control" placeholder="position" name="position"  required value={{ isset($model) ? $model->position :old('position') }}>
                                                      @if($errors->any())
                                                         {{ $errors->first('position') }}
                                                      @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Role</label>
                                                        <select class="form-select mb-3" name="role">
                                                           <option value={{ isset($model) ? $model->mainRole()->name : old('role') }}>{{ isset($model) ? $model->mainRole()->name : old('role') }}</option>
                                                            @foreach($roles as $role)
                                                                <option value={{ $role->name }}>{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                      @if($errors->any())
                                                         {{ $errors->first('role') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Status</label>
                                                        <select class="form-select mb-3" name="status">
                                                            <option value={{ isset($model) ? $model->status : old('status') }}>{{ isset($model) ? $model->status : old('status') }}</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">In-Active</option>
                                                        </select>
                                                      @if($errors->any())
                                                         {{ $errors->first('status') }}
                                                      @endif
                                                </div>
                                            </div> 
                                              <div class="form-group mb-3">
                                                <label class="form-label" for="inputFile">Select Company logo:</label>
                                               <input 
                                                type="file" 
                                                name="logo" 
                                                id="inputFile"
                                                multiple
                                                class="form-control @error('logo') is-invalid @enderror">
                                                 @if($errors->any())
                                                         {{ $errors->first('logo') }}
                                                      @endif
                                            </div>  
                                              <div class="form-group mb-3">
                                                <label class="form-label" for="inputFile">Select Company Documents:</label>
                                               <input 
                                                type="file" 
                                                name="documents[]" 
                                                id="inputFile"
                                                multiple
                                                class="form-control @error('documents') is-invalid @enderror">
                                                 @if($errors->any())
                                                         {{ $errors->first('documents') }}
                                                      @endif
                                            </div>  
                                             
                                             
                                             @if(isset($model->media))  
                                                @foreach ($model->media as $media)
                                                    <div class="col-lg-3 col-md-3 col-sm-6" style="position: relative;"> 
                                                        <img src="{{ getImage($media->path) }}" style="height: 200px;"/>
                                                        {{-- <a href="#" class="close-icon" data-toggle="modal" data-target="#confirmationModal{{ $media->id }}">
                                                            <i class="bi-x-circle" style="color:red"></i>
                                                        </a> --}}
                                                    </div>
                                            @endforeach  
                                            @endif   
                                             
                                            
                                             
                                        </div>
                                            
                                        <button class="btn btn-primary" type="submit" style="margin-top: 10px; ">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->


@endsection