@extends('layouts.app')

@section('content')
    <img src="img/banner.png" alt="" class="banner">

    <div class="hero-section">
        <p class="heading">Погрузитесь в мир релакса и красоты</p>
        <p class="plain">Уединённая атмосфера, природные элементы и продуманные спа-ритуалы в Aura Spa помогут вам восстановить силы и обрести внутреннюю гармонию.</p>
        <div class="button-wrap">
        <button class="button-main" onclick="window.location='{{ route('services.index') }}'">Записаться</button>
        <a href="">Узнать больше</a>
        </div>
    </div>
    <!-- <div class="running-slide">
        <p>Комплексный уход для тела и души: массаж, ароматерапия, сауна – со скидками для наших гостей.</p>
    </div> -->
    <div class="services">
        <div class="text">
            <p class="heading">Наши услуги</p>
            <p class="plain">Погрузитесь в мир расслабления и красоты – выберите идеальную процедуру для себя.</p>
        </div>
        <div class="service-grid">
    <div class="service-row">
        <div class="service">
            <div class="wrap">
                <h2>SPa-ПРОГРАММЫ</h2>
                <h3>
                    Ритуал «Гармония стихий» 
                    SPA-капсула «Оазис» 
                    Комплекс «Антистресс»
                </h3>
            </div>
            <a href="{{ route('services.index') }}">
                <img src="img/card-1.png" alt="">
            </a>
        </div>
        <div class="service">
            <div class="wrap">
                <h2>Массажи</h2>
                <h3>
                    Классический расслабляющий массаж
                    Тайский массаж 
                    Аромамассаж
                </h3>
            </div>
            <a href="{{ route('services.index') }}">
                <img src="img/card-3.png" alt="">
            </a>
        </div>
    </div>
    <div class="service-row">
        <div class="service">
            <div class="wrap">
                <h2>Банные ритуалы</h2>
                <h3>
                    Восточный хаммам <br>
                    Японская баня <br>
                    Финская сауна 
                </h3>
            </div>
            <a href="{{ route('services.index') }}">
                <img src="img/card-2.png" alt="">
            </a>
        </div>
        <div class="service">
            <div class="wrap">
                <h2>Уход за лицом</h2>
                <h3>
                    Глубокое увлажнение с гиалуроновой кислотой
                    Очищающий уход 
                    Антивозрастной лифтинг
                </h3>
            </div>
            <a href="{{ route('services.index') }}">
                <img src="img/card-4.png" alt="">
            </a>
        </div>
    </div>
</div>

    </div>
    <div class="reviews">
        <div class="heading">ОТЗЫВЫ КЛИЕНТОВ</div>
        <div class="service-row">
            <div class="review">
                <p>«Прекрасное место для отдыха и перезагрузки! Делала массаж и уход за лицом — всё на высшем уровне. Атмосфера очень расслабляющая, а персонал внимательный. Обязательно вернусь!»</p>
                <div class="author">
                    <img src="img/anna.png" alt="">
                    <p>Анна К.</p>
                </div>
            </div>
            <div class="review">
                <p>«Посещаю этот спа уже не первый раз — каждый раз ухожу отдохнувшим и полным сил. Особенно нравится массаж горячими камнями — невероятное ощущение расслабления!»</p>
                <div class="author">
                    <img src="img/oleg.png" alt="">
                    <p>Олег Л.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="contacts">
        <p class="heading">СВЯЖИТЕСЬ С НАМИ</p>
        <div class="service-row">
            <div class="contact">
                    <p>г. Москва, улица Пресненский Вал, 27с6
    <br><br>
                    Режим работы: с 09:00 до 21:00 
                    с понедельника по пятницу
<br><br>
                    Номер телефона администратора для связи:+7 945 482 34 12
<br><br>
                    customers@auraspa.ru</p>
            </div>
            <div class="form">
                <form action="{{ route('inquiries.store') }}" method="POST" class="inquiry-form">
                    @csrf
                    <input type="text" name="name" class="name" placeholder="Ваше имя" required>
                    <input type="phone" name="phone" class="name" placeholder="Номер телефона" required>
                    <input name="message" class="name" placeholder="Ваш вопрос или комментарий" required></input>
                    <button type="submit" class="button-main">Отправить</button>
                    <p class="disclaimer">Нажимая на кнопку, вы соглашаетесь с политикой конфиденциальности</p>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    @endsection

