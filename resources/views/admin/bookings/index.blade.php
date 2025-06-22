@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Управление бронированиями</h1>

        <a href="{{ route('admin.bookings.create') }}" class="btn btn-success mb-3">Добавить бронирование</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Услуга</th>
                    <th>Пользователь</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->service->title }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->time }}</td>
                        <td>
                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-warning">Перенести</a>

                        <a href="#" class="btn btn-danger"
                        onclick="event.preventDefault(); if(confirm('Вы уверены, что хотите удалить это бронирование?')) { document.getElementById('delete-booking-{{ $booking->id }}').submit(); }">
                            Удалить
                        </a>

                        <form id="delete-booking-{{ $booking->id }}" action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
