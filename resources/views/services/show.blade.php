@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-row">
        <div class="txt-column">
            <h2 style="margin-top: 5%;">{{ $service->title }}</h2>
            <p>{{ $service->description }}</p>
            <p style="font-size: 24px;"><strong>{{ $service->price }} ₽</strong></p>

            @auth
                <button class="button-main" onclick="window.location='{{ route('booking.form', $service->id) }}'">Записаться</button>
            @else
                <p><a href="{{ route('login') }}">Войдите, чтобы записаться</a></p>
            @endauth
        </div>

        <div class="img">
            <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="img">
        </div>
    </div>

    <h2>Отзывы</h2>

    @auth
        <form action="{{ route('services.storeReview', $service->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="rating">Оценка</label>
                <select name="rating" id="rating" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="form-group">
                <textarea class="textarea" name="review" id="review" rows="4" required></textarea>
            </div>
            <p class="disclaimer">Наша система проверит факт вашего бронирования услуги. <br>   Если вы не пользовались данной услугой, вы не сможете оставить отзыв.</p>
            <button type="submit" class="button-main">Отправить отзыв</button>
        </form>
    @endauth
    @foreach($reviews as $review)
        <div class="review_serv">
            <p><strong>{{ $review->user->name }}</strong> - Оценка: {{ $review->rating }}/5</p>
            <p>{{ $review->review }}</p>
        </div>
    @endforeach
    
</div>
@endsection
