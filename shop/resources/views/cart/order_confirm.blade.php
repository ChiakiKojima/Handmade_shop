@extends('layout')

@section('title', '注文のご確認')

@section('content')
    <h3>以下の内容でよろしければ、ご注文ボタンを押して下さい。</h3>
  
    <hr/>
    
    @include('errors.form_errors')
    
    <div class="d-flex justify-content-between py-5">
        <div class="card">
            <div class="card-body">
              
                <table>
                    @for($i = 0; $i < $count; $i++)
                        <tr>
                            <td name="items" class="pr-3">{{ $items[$i]['item'] }}</td>
                            <td name="price" class="text-danger pr-3">¥ {{ $items[$i]['price'] }}</td>
                            <td>数量: {{ $items[$i]['num'] }}</td>
                        </tr>
                    @endfor
                </table>
        
            </div>
        </div>
        <div class="form-inline">
            <h3>合計金額</h3>　
            <h3 name="sum" class="text-danger">¥ {{ $sum }}</h3>
        </div>
    </div>
    
    <table class="table table-striped mb-5">
      <tr>
        <th>お名前</th>
        <td>{{ $receiver['name'] }}</td>
       </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{ $receiver["email"] }}</td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td>{{ $receiver['tel'] }}</td>
      </tr>
      <tr>
        <th>郵便番号</th>
        <td>{{ $receiver['postcode'] }}</td>
      </tr>
      <tr>
        <th>住所</th>
        <td>{{ $receiver['prefecture']}}{{ $receiver['city']}}{{ $receiver['no']}}</td>
      </tr>
      <tr>
        <th>お支払い方法</th>
        <td>
            @if ($payment['payment'] == 'advance')
              前払い（銀行振込）
            @else
              代金引換
            @endif
        </td>
      </tr>
    </table>
    
    {!! Form::open(['url' => '/order_complete']) !!}
      {!! Form::submit('注文を確定する', ['class' => 'btn btn-warning form-control']) !!}
    {!! Form::close() !!}
    

@endsection