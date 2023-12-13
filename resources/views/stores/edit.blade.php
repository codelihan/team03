@extends('app')

@section('title', '編輯特定車商')

@section('bike_contents')
    {!! Form::model($store, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\StoresController@update', $store->id]]) !!}
    @include('stores.form', ['submitButtonText'=>'更新車商資料'])
    {!! Form::close() !!}
@endsection
