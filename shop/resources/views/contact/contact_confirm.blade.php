@extends('layout')

@section('title', 'contact')

@section('content')
    <h3>以下の内容でよろしければ、送信ボタンを押して下さい。</h3>
  
    <hr/>
    
    @include('errors.form_errors')
    
    <table class="table table-striped">
      <tr>
        <th>お名前</th>
        <td>{{ $contact['name'] }}</td>
       </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{ $contact["email"] }}</td>
      </tr>
      <tr>
        <th>件名</th>
        <td>{{ $contact['title'] }}</td>
      </tr>
      <tr>
        <th>内容</th>
        <td>{{ $contact['body'] }}</td>
      </tr>
    </table>
    
    {!! Form::open(['url' => '/send']) !!}
      {!! Form::submit('送信', ['class' => 'btn btn-info form-control']) !!}
    {!! Form::close() !!}
    

@endsection