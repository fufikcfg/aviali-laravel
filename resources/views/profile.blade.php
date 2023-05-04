@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="card">
        <div style="width: 100%; background: #606f7b;" class="upper">
            <img src="" class="img-fluid">
        </div>
        <div class="user text-center">
        <div class="mt-5 text-center">
            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
            <span class="text-muted d-block mb-2">{{ Auth::user()->id }}</span>
            <span class="text-muted d-block mb-2">{{ Auth::user()->numberPhone }}</span>
        </div>
    </div>
</div>
@endsection
