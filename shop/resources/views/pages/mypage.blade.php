
@extends('layout')
@section('title', 'My page')



@section('content')
     @include('flash::message')
    <h1>
        My page
        <a href="edit" class="btn btn-primary float-right">編集</a>
    </h1>
    <hr/>
<div>
    お名前:
    {{ $user->name }}
</div>
<div>
    メールアドレス:
    {{ $user->email }}
</div>

<div>
    電話番号：
    @if ( $user->tel == null )
        登録されていません。
    @else
        {{ $user->tel }}
    @endif
</div>

<div>
    郵便番号：
    @if ( $user->postcode == null)
        登録されていません。
    @else
        {{ $user->postcode }}
    @endif
</div>
<div>
    住所：
    @if ( $user->prefecture == null )
        登録されていません。
    @else
        {{ $user->prefecture }}
        {{ $user->city }}
        {{ $user->no }}
    @endif
</div>



@endsection

