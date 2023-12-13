@extends('app')

@section('title', '修改替定車款')

@section('bike_contents')
    {!! Form::model($car, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\CarsController@update', $car->id]]) !!}
    @include('cars.form', ['submitButtonText'=>"更新車款資料"])
    {!! Form::close() !!}
@endsection
