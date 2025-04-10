<?php

// database/seeders/PlanSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run()
    {
        $plans = [
            [
                'plan_name' => 'Базовый',
                'price' => 10,
                'features' => json_encode([
                    'Хранилище' => '10 ГБ',
                    'Пользователи' => '1 пользователь'
                ])
            ],
            [
                'plan_name' => 'Стандартный',
                'price' => 25,
                'features' => json_encode([
                    'Хранилище' => '50 ГБ',
                    'Поддержка' => 'Поддержка по электронной почте и в чате',
                    'Пользователи' => 'До 5 пользователей'
                ])
            ],
            [
                'plan_name' => 'Премиум',
                'price' => 50,
                'features' => json_encode([
                    'Хранилище' => '200 ГБ',
                    'Поддержка' => 'Приоритетная поддержка',
                    'Ежедневные отчеты',
                    'Пользователи' => 'Неограниченное количество пользователей'
                ])
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
