@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="?category=auto">Авто</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?mode=ads&category=property">Недвижимость</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/{services}">Услуги</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?category=forhome">Вещи для дома</a>
        </li>
    </ul>
    @empty(Auth::user())
        @foreach($ads as $item)
            <div class="card">
                <h5 class="card-header">{{ $item->category }} | {{ $item->name }}</h5>
                <div class="card-body">
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="card-text">{{ $item->price }} ₽</p>
                    <p class="card-text">{{ $item->contact }}</p>
                    <p class="card-text">{{ $item->status }}</p>
                </div>
            </div>
        @endforeach
    @endempty
    @empty(!Auth::user())
        @foreach($ads as $item)
            <div class="card">
                <h5 class="card-header">{{ $item->category }} | {{ $item->name }}</h5>
                <div class="card-body">
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="card-text">{{ $item->price }} ₽</p>
                    <p class="card-text">{{ $item->contact }}</p>
                    <p class="card-text">{{ $item->status }}</p>
                    @if($item->idUser == Auth::user()->id)
                        <a href="#" class="link-danger">Изменить</a> | <a href="#" class="link-danger">Удалить</a>
                    @endif
                </div>
            </div>
        @endforeach
    @endempty
@endsection

