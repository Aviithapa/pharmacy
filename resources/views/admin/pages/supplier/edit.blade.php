@extends('admin.layout.app')

@section('content')

   @include('admin.pages.supplier.form', ['model' => $data])

@endsection