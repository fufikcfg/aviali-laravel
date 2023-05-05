@extends('layouts.app')

@section('content')
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
            <select name="category" class="form-select" id="select-class" aria-label="Default select example">
                <option value="Авто">Авто</option>
                <option value="Недвижимость">Недвижимость</option>
                <option value="Услуги">Услуги</option>
                <option value="Вещи для дома">Вещи для дома</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-create-ads">Создать</button>
    </form>
@endsection
