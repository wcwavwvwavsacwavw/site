<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Спа-салон Aura Spa</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>

    <nav>
        <div class="image-wrapper">
            <img src="/img/burger-icon.png" alt="Меню" class="burger-icon" id="burger">
            <a href="{{ route('welcome') }}">
                <img src="/img/logo.png" alt="Логотип" class="logo">
            </a>
        
        </div>
    </nav>

    <div class="overlay" id="overlay"></div>

    <div class="menu" id="menu">
        <ul>
            <li><a href="{{ route('services.index') }}">Услуги</a></li>
            <li><a href="{{ route('certificates.create') }}">Сертификаты</a></li>

            @auth
            @if(auth()->user()->is_admin == '1') 
                    <li><a href="{{ route('admin.dashboard') }}">Админка</a>
                    </li> 
                @endif

                <li><a href="{{ route('profile.index') }}">Личный кабинет</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <li><a href="{{ route('login') }}">Войти</a></li>
                <li><a href="{{ route('register') }}">Зарегистрироваться</a></li>
            @endauth
        </ul>
    </div>

    <main class="py-4">
        @yield('content')
    </main>

    <script src="/script.js"></script>

</body>
</html>
