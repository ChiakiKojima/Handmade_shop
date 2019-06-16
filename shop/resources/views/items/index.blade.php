@extends('layout')
@section('title', 'items')



@section('content')
     @include('flash::message')
    <h1>Items
        @auth
        <a href="items/cart" class="btn btn-primary float-right">カート</a>
        @endauth
    </h1>
    <hr/>

    <div class="row">
        @foreach($items as $item)
            @if ($item->available === 1)
                <div class="col-lg-4">
                    
                    <div class="card" style="width: 20rem;">
                        <a href="{{ url('items', $item->id) }}" class="text-decoration-none card-link">
                            <img class="card-img-top" src="{{ $item->image }}" alt="イメージ画像">
                            <div class="card-body">
                                <p class="card-title text-dark">{{ $item->name }}</p>
                        </a>
                                <p class="card-text text-secondary">{{ $item->comma_price }}円</p>
                               
                            </div>
                    </div>
                    
                </div>
            @endif
        @endforeach
    </div>
    
@endsection