<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Кремация
        Service::create([
            'name' => 'Кремация',
            'description' => 'Крема́ция (от лат. cremare «сжечь, сжигать») — процесс сожжения тел. По современным европейским правилам после кремации прах умершего помещается в погребальную урну и затем может быть захоронен различными путями.',
            'price' => 1800,
        ]);

        // Ритуальные услуги
        Service::create([
            'name' => 'Кремация с захоронением',
            'description' => 'Услуга включает в себя захоронение',
            'price' => 600,
        ]);
        Service::create([
            'name' => 'Надмогильные сооружения',
            'description' => 'Услуга включает в себя установку памятника (материал на выбор), монтаж оградки вокруг захоронения, благоустройство моглиы и декоративные элементы (вазы, лавочки, газон, покрытия из гальки)',
            'price' => 5000
        ]);
        Service::create([
            'name' => 'Перенос гроба с урной на плечах джентельменов',
            'description' => 'Гроб умершего будут переносить 8 джентельменов на своих плечах',
            'price' => 90000,
            'is_active' => false
        ]);
        Service::create([
            'name' => 'Развеяние праха умершего над шахтой',
            'description' => 'Прах рассыпается над рабочей шахтой',
            'price' => 20000,
            'is_active' => false
        ]);

        // Урны
        Service::create([
            'name' => 'Урна металлическая',
            'description' => 'Металлическая урна темного цвета',
            'price' => 5000,
        ]);
        Service::create([
            'name' => 'Урна деревянная',
            'description' => 'Деревянная урна, окрашенная в черный',
            'price' => 3000,
        ]);
        Service::create([
            'name' => 'Урна керамическая',
            'description' => 'Металлическая урна темного цвета',
            'price' => 6000,
        ]);
        Service::create([
            'name' => 'Урна биоразлагаемая',
            'description' => 'Биоразлагаемая урна, которая разложится в течении 12 месяцев',
            'price' => 6500,
        ]);
        Service::create([
            'name' => 'Урна чугунная',
            'description' => 'Чугунная урна прямиком из Китая',
            'price' => 5000,
        ]);

        // Транспорт
        Service::create([
            'name' => 'Катафалк для перевозки гроба',
            'description' => 'Перевозка гроба',
            'price' => 10000,
        ]);
        Service::create([
            'name' => 'Доставка тела',
            'description' => 'Доставка тела в крематорий усилиями организации',
            'price' => 10000,
        ]);
    }
}
