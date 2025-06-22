<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Ритуал «Гармония стихий»',
                'description' => 'Комплексная процедура с использованием природных элементов.',
                'price' => 7000,
                'image' => 'img/services/harmony.jpg'
            ],
            [
                'title' => 'SPA-капсула «Оазис»',
                'description' => 'Глубокая релаксация с аромамаслами и тепловым воздействием.',
                'price' => 8000,
                'image' => 'img/services/oasis.jpg'
            ],
            [
                'title' => 'Классический расслабляющий массаж',
                'description' => 'Снятие напряжения и восстановление тонуса мышц.',
                'price' => 3500,
                'image' => 'img/services/classic-massage.jpg'
            ],
            [
                'title' => 'Тайский массаж',
                'description' => 'Древняя практика для восстановления жизненной энергии.',
                'price' => 5000,
                'image' => 'img/services/thai-massage.jpg'
            ],
            [
                'title' => 'Восточный хаммам',
                'description' => 'Глубокое очищение кожи и расслабление в паровой бане.',
                'price' => 6000,
                'image' => 'img/services/hammam.jpg'
            ],
            [
                'title' => 'Антивозрастной лифтинг',
                'description' => 'Косметологическая процедура для подтяжки и омоложения кожи.',
                'price' => 6000,
                'image' => 'img/services/lifting.jpg'
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
