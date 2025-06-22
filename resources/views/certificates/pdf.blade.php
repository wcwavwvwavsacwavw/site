<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/DejaVuSans.ttf') }}") format('truetype');
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            background-color: #f8f8f8;
            color: #2d2b2b;
            text-align: center;
        }

        .certificate-container {
            background: #fff;
            border: 3px solid #223d21;
            border-radius: 20px;
            width: 100%;
            max-width: 700px;
            margin: auto;
        }

        h1 {
            font-size: 36px;
            font-weight: 350;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        p {
            font-size: 20px;
            margin: 10px 0;
        }

        .strong {
            font-weight: bold;
            color: #223d21;
        }

        .code {
            font-size: 22px;
            margin-top: 40px;
            padding: 10px;
            border: 2px dashed #223d21;
            display: inline-block;
            background-color: #f0f0f0;
            border-radius: 10px;
        }

        .footer {
            margin-top: 60px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <h1>Подарочный сертификат</h1>

        <p>Получатель: <span class="strong">{{ $certificate->recipient_name }}</span></p>
        <p>Сумма: <span class="strong">{{ $certificate->amount }} ₽</span></p>
        <p>Действителен до: <span class="strong">{{ \Carbon\Carbon::parse($certificate->expiry_date)->format('d.m.Y') }}</span></p>

        <div class="code">
            Код сертификата: <strong>{{ $certificate->code }}</strong>
        </div>

        <div class="footer">
            Aura Spa • <a href="https://spasalon-aura.ru/">spasalon-aura.ru</a>
        </div>
    </div>
</body>
</html>
