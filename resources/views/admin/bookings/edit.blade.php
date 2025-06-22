@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Перенос бронирования</h1>

        <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" class="booking-edit">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="date">Новая дата</label>
                <input type="date" id="date" name="date" class="booking-select"  value="{{ old('date', $booking->date) }}" required>
            </div>

            <div class="form-group">
                <label for="time">Новое время</label>
                <select id="time" name="time" class="booking-select" required>
                    <option value="10:00" {{ $booking->time == '10:00' ? 'selected' : '' }}>10:00</option>
                    <option value="12:00" {{ $booking->time == '12:00' ? 'selected' : '' }}>12:00</option>
                    <option value="14:00" {{ $booking->time == '14:00' ? 'selected' : '' }}>14:00</option>
                    <option value="16:00" {{ $booking->time == '16:00' ? 'selected' : '' }}>16:00</option>
                </select>
            </div>

            <button type="submit" class="button-main">Перенести бронирование</button>
        </form>
    </div>
@endsection
