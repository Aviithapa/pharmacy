@extends('admin.layout.app')

@section('content')

   @include('admin.pages.receiving.form',['model' => $data, 'suppliers' => $suppliers, 'medicines' => $medicines])

@endsection