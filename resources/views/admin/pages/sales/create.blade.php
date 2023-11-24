@extends('admin.layout.app')

@section('content')

   @include('admin.pages.sales.form',['customers' => $customers, 'medicines' => $medicines])

@endsection