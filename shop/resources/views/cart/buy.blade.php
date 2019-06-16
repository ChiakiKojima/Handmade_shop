@extends('layout')
@section('title', 'cart')

@section('content')
    
<h1>注文が完了しました</h1>

    <table>
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>数量</th>
            <th>小計</th>
        </tr>
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $input['num'] }}個</td>
            <td>{{ $item->price * $input['num'] }}円</td>
        </tr>
        
    </table>

合計金額
<a href="{{ action('ItemsController@index') }}" class="btn btn-secondary float-right">一覧へ戻る</a>

@endsection