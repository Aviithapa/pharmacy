@extends('admin.layout.app')

@section('content')

   @include('admin.pages.customer.form', ['model' => $data])

@endsection