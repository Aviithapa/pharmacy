@extends('admin.layout.app')

@section('content')

   @include('admin.pages.sales.form',['model' => $data, 'customers' => $customers, 'medicines' => $medicines])

@endsection