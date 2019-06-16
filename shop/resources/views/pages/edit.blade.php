@extends('layout')
@section('title', 'Mypage編集')
 
@section('content')
    <h1>お客様情報の編集</h1>
 
    <hr/>
    
    @include('errors.form_errors')
 
    {!! Form::model($user, ['method' => 'PATCH', 'url' => 'mypage']) !!}
        @include('pages.user_form', ['submitButton' => '更新'])
    {!! Form::close() !!}
@endsection