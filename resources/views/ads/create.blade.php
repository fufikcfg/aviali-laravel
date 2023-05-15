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
    <form action="{{ route('create-ads-submit') }}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Название</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Описание</label><br>
                <textarea name="description" id="form-control" cols="84" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label>Цена:</label>
            <input name="price" type="number" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Категория</label>
            <select name="category_id" class="form-select" id="select-class" aria-label="Default select example">
                <option value="1">Авто</option>
                <option value="2">Недвижимость</option>
                <option value="3">Услуги</option>
                <option value="4">Вещи для дома</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-create-ads">Создать</button>
    </form>
@endsection
