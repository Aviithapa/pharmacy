@extends('admin.layout.app')

@section('content')

   @include('admin.pages.medicine.form', ['model' => $data, 'classification' => $classification])

@endsection