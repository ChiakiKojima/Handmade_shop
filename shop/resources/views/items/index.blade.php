@extends('layout')
@section('title', 'Handmade shop')

@section('content')

    <h1>Items</h1>
    <hr/>

    <div class="row">
        @foreach($items as $item)
            @if ($item->available === 1)
                <div class="col-lg-4">
                    
                    <div class="card mx-auto mb-3" style="width: 20rem;">
                        <a href="{{ url('items', $item->id) }}" class="text-decoration-none card-link opacity">
                            <img class="card-img-top" src="{{ $item->image }}" alt="イメージ画像">
                            <div class="card-body">
                                <p class="card-title text-dark">{{ $item->name }}</p>
                                <p class="card-text text-secondary">{{ $item->comma_price }}円</p>
                            </div>
                        </a>
                    </div>
                    
                </div>
            @endif
        @endforeach
    </div>
    
@endsection