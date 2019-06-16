@extends('layout')
@section('title', 'お支払い')

@section('content')
    
<h1>お支払い方法をお選び下さい</h1>

@include('errors.form_errors')

{!! Form::open(['url' => 'order_confirm']) !!}

    <div class="form-check">
        <label class="form-check-label">
            {{Form::radio('payment', 'advance')}}前払い（銀行振込）
        </label>
    </div> 
    <div class="form-check">
        <label class="form-check-label">        
        {{Form::radio('payment', 'cashon')}}代金引換
        </label>
    </div>
    <div class="form-group">
        {!! Form::submit('次へ進む', ['class' => 'btn btn-warning']) !!}
    </div>
    
{!! Form::close() !!}
    


<a href="{{ action('ItemsController@index') }}" class="btn btn-secondary float-right">一覧へ戻る</a>

@endsection