@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать услугу: {{ $service->title }}</h1>

        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="booking-edit"    >
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Название услуги</label>
        <input type="text" name="title" class="booking-select" id="title" value="{{ old('title', $service->title) }}" required>
    </div>

    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" class="booking-select" id="description" required>{{ old('description', $service->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="price">Цена</label>
        <input type="number" name="price" class="booking-select" id="price" value="{{ old('price', $service->price) }}" required>
    </div>

    <div class="form-group">
        <label for="image">Путь к изображению (оставьте пустым, если не хотите менять)</label>
        <input type="text" name="image" class="booking-select" id="image" value="{{ old('image', $service->image) }}">
    </div>

    <button type="submit" class="button-main">Обновить</button>
</form>

    </div>
@endsection
