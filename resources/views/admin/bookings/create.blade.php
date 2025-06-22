@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить бронирование</h1>

    <form action="{{ route('admin.bookings.store') }}" class="booking-edit" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">Пользователь</label>
            <select id="user_id" name="user_id" class="booking-select" required>
                <option value="">Выберите пользователя</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="service_id">Услуга</label>
            <select id="service_id" name="service_id" class="booking-select" required>
                <option value="">Выберите услугу</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date">Дата</label>
            <input type="date" id="date" name="date" class="booking-select" required>
        </div>

        <div class="form-group">
            <label for="time">Время</label>
            <select id="time" name="time" class="booking-select" required>
                <option value="10:00">10:00</option>
                <option value="12:00">12:00</option>
                <option value="14:00">14:00</option>
                <option value="16:00">16:00</option>
            </select>
        </div>

        <button type="submit" class="button-main">Добавить бронирование</button>
    </form>
</div>
@endsection
