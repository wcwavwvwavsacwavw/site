@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Админская панель</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Управление услугами</h3>
                </div>
                <div class="card-body">
                    <p>Просмотр, добавление и редактирование услуг.</p>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Перейти к услугам</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Управление бронированиями</h3>
                </div>
                <div class="card-body">
                    <p>Просмотр, добавление и редактирование бронирований.</p>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary">Перейти к бронированиям</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
