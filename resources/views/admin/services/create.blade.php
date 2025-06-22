@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Добавить услугу</h1>
        <form action="{{ route('admin.services.store') }}" class="booking-edit" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Название услуги</label>
        <input type="text" name="title" id="title" required class="booking-select">
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description"  id="description" required class="booking-select"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Цена</label>
        <input type="number" name="price"  id="price" required class="booking-select">
    </div>
    <div class="form-group">
        <label for="image">Путь к изображению</label>
        <input type="text" name="image"  id="image" required class="booking-select">
    </div>
    <button type="submit" class="button-main">Добавить</button>
</form>

    </div>
@endsection
