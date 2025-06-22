@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Личный кабинет</h2>

    <h3>Здравствуйте, {{ $user->name }}</h3>
    <p>Email: {{ $user->email }}</p>

    <hr>

    <h2>Ваши записи</h2>
    @if ($bookings->count())
        <ul>
            @foreach ($bookings as $booking)
                <li>
                    <strong>{{ $booking->service->title }}</strong> — {{ $booking->date }} в {{ $booking->time }}
                    <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button style="margin-left: 60px; width: fit-content;"class="button-main" type="submit">Отменить</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>У вас пока нет записей.</p>
    @endif
</div>
@endsection
