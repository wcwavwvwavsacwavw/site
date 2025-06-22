@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 5%;">
    <h2>Оформить подарочный сертификат</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('certificates.store') }}" method="POST">
        @csrf
        <input type="number" id="name" name="amount" placeholder="Сумма сертификата (₽)" required><br><br>
        <input type="text" id="name" name="recipient_name" placeholder="Имя получателя" required><br><br>
        <input type="email" id="name" name="recipient_email" placeholder="Email получателя" required><br><br>
        <button type="submit" class="button-main">Оформить</button>
    </form>
</div>
@endsection
