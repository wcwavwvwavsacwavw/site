@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Записаться на услугу {{ $service->name }}</h2>

    <form  class="booking-form" action="{{ route('booking.submit', $service->id) }}" method="POST">
        @csrf

        <label for="date">Выберите дату:</label>
        <input type="date" id="date" name="date" min="{{ now()->toDateString() }}" required class="calendar">

        <label for="time">Выберите время:</label>
        <select id="time" name="time" required class="booking-select">
            @php
                $allTimes = ['10:00', '12:00', '14:00', '16:00'];
            @endphp

            @foreach($allTimes as $time)
                @if(!isset($bookedSlots[$time])) 
                    <option value="{{ $time }}">{{ $time }}</option>
                @endif
            @endforeach
        </select>

        <button type="submit" class="button-main">Записаться</button>
    </form>
</div>
@endsection
