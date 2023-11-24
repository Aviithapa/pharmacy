@extends('admin.layout.app')

@section('content')

   @include('admin.pages.receiving.form',['suppliers' => $suppliers, 'medicines' => $medicines])

@endsection