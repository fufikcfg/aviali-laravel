@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href={{ url("/ads/1") }}>Авто</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url("/ads/2") }}">Недвижимость</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url("/ads/3") }}">Услуги</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url("/ads/4") }}">Вещи для дома</a>
        </li>
    </ul>
    @empty(Auth::user())
        @foreach($ads as $item)
            <div class="card">
                <h5 class="card-header">{{ $item->category_id }} | {{ $item->name }}</h5>
                <div class="card-body">
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="card-text">{{ $item->price }} ₽</p>
                    <p class="card-text">{{ $item->contact }}</p>
                    <p class="card-text">{{ $item->status_id }}</p>
                </div>
            </div>
        @endforeach
    @endempty
    @empty(!Auth::user())
        @foreach($ads as $item)
            <div class="card">
                <h5 class="card-header">{{ $item->category->category}} | {{ $item->name }}</h5>
                <div class="card-body">
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="card-text">{{ $item->id }}</p>
                    <p class="card-text">{{ $item->price }} ₽</p>
                    <p class="card-text">{{ $item->contact }}</p>
                    <p class="card-text">{{ $item->status->status }}</p>
                    @if($item->user_creat_id == Auth::user()->id)
                        <a href="{{ route('update', $item->id) }}" class="link-danger">Изменить</a> | <a href="{{ route('destroy-ads', $item->id) }}" class="link-danger">Удалить</a>
                    @endif
                </div>
            </div>
        @endforeach
    @endempty
@endsection

