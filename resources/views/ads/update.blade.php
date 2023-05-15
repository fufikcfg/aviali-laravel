@extends('layouts.app')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach($adsData as $item)
        <form action="{{ route('updating', $item->id) }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Название</label><div class="id"></div>
                    <input value="{{ $item->name }}" name="name" type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col-md-6">
                    <label>Описание</label><br>
                    <textarea name="description" id="form-control" cols="84" rows="3">{{ $item->description }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label>Цена:</label>
                <input value="{{ $item->price }}" name="price" type="number" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Категория</label>
                <select name="category_id" class="form-select" id="select-class" aria-label="Default select example">

                    <option value="1" {{ $item->category_id == 1 ? 'selected' : '' }}>Авто</option>
                    <option value="2" {{ $item->category_id == 2 ? 'selected' : '' }}>Недвижимость</option>
                    <option value="3" {{ $item->category_id == 3 ? 'selected' : '' }}>Услуги</option>
                    <option value="4" {{ $item->category_id == 4 ? 'selected' : '' }}>Вещи для дома</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Статус</label>
                <select name="status_id" class="form-select status-select" id="select-class" aria-label="Default select example">
                    <option value="1" {{ $item->status_id == 1 ? 'selected' : '' }}>Активно</option>
                    <option value="2" {{ $item->status_id == 2 ? 'selected' : '' }}>Неактивно</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-create-ads">Изменить</button>
        </form>
    @endforeach
@endsection
