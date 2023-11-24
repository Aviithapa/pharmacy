@extends('admin.layout.app')

@section('content')

   @include('admin.pages.medicine-classification.form', ['model' => $data])

@endsection