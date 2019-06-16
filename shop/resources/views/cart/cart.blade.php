@extends('layout')
@section('title', 'cart')

@section('content')
    
<h1>ショッピングカート</h1>
<a href="{{ action('ItemsController@index') }}" class="btn btn-secondary float-right">一覧へ戻る</a>

@include('errors.form_errors')

{!! Form::open(['url' => 'delivery']) !!}

    <table class="table">
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>数量</th>
            <th>小計</th>
            <th></th>
        </tr>
        @for($i = 0; $i < $count; $i++)
            <tr class="table-light">
                <td name="items">{{ $orders[$i]['item'] }}</td>
                <td name="price">{{ $orders[$i]['price'] }}</td>
                <td>{!! Form::input('number', 'num[]', $orders[$i]['num'], ['class' => 'form-control', 'min'=>1,'max'=>9]) !!}</td>
                <td name="subtotal">{{ $orders[$i]['price']*$orders[$i]['num'] }}円</td>
                <td><a href="/cart/delete?id={{$orders[$i]['id']}}">削除</a></td>
                <td>{!! Form::hidden('id', $orders[$i]['id']) !!}</td>
            </tr>
        @endfor
    </table>
    <div class="form-inline">
        <h3>合計金額</h3>　
        <h3 id="sum">{{ $sum }}円</h3>
        {!! Form::hidden('sum', $sum, ['id' => 'hiddenSum']) !!}
    </div>
    
    <div class="d-flex justify-content-between">
        <div class="form-group">
            {!! Form::submit('レジに進む', ['class' => 'btn btn-warning']) !!}
        </div>

{!! Form::close() !!}


        {!! Form::open(['url' => '/']) !!}
            <div class="form-group">
                {!! Form::submit('カートを空にする', ['class' => 'btn btn-outline-primary']) !!}
            </div>
    </div>
{!! Form::close() !!}

@endsection