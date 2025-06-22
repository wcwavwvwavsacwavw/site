@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Админка: Услуги</h1>

    <a href="{{ route('admin.services.create') }}">Добавить услугу</a>

    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->price }} ₽</td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}">Редактировать</a> |
                        
                        <a href="#" 
                           onclick="event.preventDefault(); if(confirm('Удалить?')) { document.getElementById('delete-service-{{ $service->id }}').submit(); }">
                            Удалить
                        </a>
                        <form id="delete-service-{{ $service->id }}" action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display: none;">
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
