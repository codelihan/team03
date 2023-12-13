@extends('app')

@section('title', '建立車種表單')

@section('bike_contents')
    {!! Form::open(['url' => 'cars/store']) !!}
    @include('cars.form', ['submitButtonText'=>"新增車種資料"])
    {!! Form::close() !!}
@endsection
