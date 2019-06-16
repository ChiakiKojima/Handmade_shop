@extends('layout')
@section('title', '配送先')

@section('content')
    
<h1>配送</h1>

@include('errors.form_errors')

    <h3>お届け先をご入力下さい</h3>
    
    @guest
        {!! Form::open(['url' => 'payment']) !!}
            @include('pages.user_form', ['submitButton' => '次へ'])
    @else
        {!! Form::model($user, ['method' => 'POST','url' => 'payment']) !!}
            @include('pages.user_form', ['submitButton' => '次へ'])
    @endguest
    
{!! Form::close() !!}
    


<a href="{{ action('ItemsController@index') }}" class="btn btn-secondary float-right">一覧へ戻る</a>

@endsection