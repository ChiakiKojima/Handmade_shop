@extends('layout')
@section('title', $item->name )

@section('content')
    @include('flash::message')
    <h1>{{ $item->name }}</h1>
    @include('errors.form_errors')
    <hr/>
    
    <div class="row">
        <div class="col-lg-6">
            <img src="/{{ $item->image }}" alt="イメージ画像" width="50%">
        </div>
        <div class="col-lg-6">    
            <div class = "description">
                {{ $item->description }}<br>
                {{ $item->comma_price }}円<br>
                @if ($item->available === 1)
                在庫： あり
                @else
                在庫： なし
                @endif
            </div>
            
            <div>
                {!! Form::open(['url' => 'cart']) !!}
                    <div class="form-group form-inline">
                    {!! Form::input('number', 'num', null, ['class' => 'form-control', 'min'=>1,'max'=>9]) !!}個
                    </div>
                    <div class="form-group">
                        {!! Form::submit('カートに入れる', ['class' => 'btn btn-warning']) !!}
                    </div>
                {!! Form::hidden('id', $item->id) !!}
                {!! Form::hidden('item', $item->name) !!}
                {!! Form::hidden('price', $item->price) !!}
                {!! Form::close() !!}
            </div>
                
                
                
                <a href="{{ action('ItemsController@index') }}" class="btn btn-secondary float-right">一覧へ戻る</a>
            </div>
        </div>
    </div>
    
    
    
                    
@endsection