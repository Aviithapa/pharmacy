@extends('admin.layout.app')

@section('content')

   @include('admin.pages.medicine.form',['classification' => $classification])

@endsection