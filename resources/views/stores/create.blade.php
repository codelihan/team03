@extends('app')

@section('title', '建立車商表單')


@section('bike_contents')
    {!! Form::open(['url' => 'stores/store']) !!}
    @include('stores.form', ['submitButtonText'=>'新增車商資料'])
    {!! Form::close() !!}
@endsection
