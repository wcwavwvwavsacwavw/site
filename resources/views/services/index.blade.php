@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="margin-top: 5%;">Наши услуги</h2>
    <form method="GET" action="{{ route('services.index') }}">
        <div class="filter">
            <label for="title">Поиск по названию:</label>
            <input type="text" name="title" id="title" value="{{ request('title') }}" placeholder="Введите название">
            <label for="sort">Сортировка по цене:</label>
            <select name="sort" id="sort">
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>По возрастанию</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>По убыванию</option>
            </select>

            <button type="submit" class="button-main" id="button-sort">Применить</button>
        </div>
    </form>

    <div class="services-grid">
        @foreach ($services as $service)
            <a href="{{ route('services.show', $service->id) }}">
                <div class="service-card">
                    <img src="{{ asset( $service->image) }}" alt="{{ $service->title }}">
                    <h2>{{ $service->title }}</h2>
                    <p>{{ $service->description }}</p>
                    <span class="price">{{ $service->price }} ₽</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
