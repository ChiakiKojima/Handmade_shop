@extends('layout')

@section('title', 'contact')

@section('content')
        <h1>お問い合わせ</h1>
      
        <hr/>
        
        @include('errors.form_errors')
        
        @guest
            @include('contact.common_form', ['nameValue' => null, 'mailValue' => null])
        @else
            @include('contact.common_form', ['nameValue' => $user->name, 'mailValue' => $user->email])
        @endguest

@endsection