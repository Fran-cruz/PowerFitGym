<?php

namespace Database\Seeders;

use App\Models\GroupClass;
use App\Models\TrainingArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainingAreaIds = TrainingArea::query()->pluck('id', 'name');

        $classes = [
            ['training_area' => 'Cardio', 'name' => 'Spinning', 'day_of_week' => 'lunes', 'start_time' => '06:00:00'],
            ['training_area' => 'Funcional', 'name' => 'HIIT', 'day_of_week' => 'martes', 'start_time' => '06:00:00'],
            ['training_area' => 'Cardio', 'name' => 'Spinning', 'day_of_week' => 'miércoles', 'start_time' => '06:00:00'],
            ['training_area' => 'Funcional', 'name' => 'HIIT', 'day_of_week' => 'jueves', 'start_time' => '06:00:00'],
            ['training_area' => 'Cardio', 'name' => 'Spinning', 'day_of_week' => 'viernes', 'start_time' => '06:00:00'],
            ['training_area' => 'Clases Grupales', 'name' => 'Yoga', 'day_of_week' => 'sábado', 'start_time' => '06:00:00'],
            ['training_area' => 'Musculación', 'name' => 'Body Pump', 'day_of_week' => 'lunes', 'start_time' => '09:00:00'],
            ['training_area' => 'Clases Grupales', 'name' => 'Yoga', 'day_of_week' => 'martes', 'start_time' => '09:00:00'],
            ['training_area' => 'Musculación', 'name' => 'Body Pump', 'day_of_week' => 'miércoles', 'start_time' => '09:00:00'],
            ['training_area' => 'Clases Grupales', 'name' => 'Yoga', 'day_of_week' => 'jueves', 'start_time' => '09:00:00'],
            ['training_area' => 'Musculación', 'name' => 'Body Pump', 'day_of_week' => 'viernes', 'start_time' => '09:00:00'],
            ['training_area' => 'Funcional', 'name' => 'Cross Training', 'day_of_week' => 'sábado', 'start_time' => '09:00:00'],
            ['training_area' => 'Funcional', 'name' => 'Cross Training', 'day_of_week' => 'lunes', 'start_time' => '18:00:00'],
            ['training_area' => 'Clases Grupales', 'name' => 'Zumba', 'day_of_week' => 'martes', 'start_time' => '18:00:00'],
            ['training_area' => 'Funcional', 'name' => 'Cross Training', 'day_of_week' => 'miércoles', 'start_time' => '18:00:00'],
            ['training_area' => 'Clases Grupales', 'name' => 'Zumba', 'day_of_week' => 'jueves', 'start_time' => '18:00:00'],
            ['training_area' => 'Funcional', 'name' => 'HIIT', 'day_of_week' => 'viernes', 'start_time' => '18:00:00'],
            ['training_area' => 'Clases Grupales', 'name' => 'Yoga', 'day_of_week' => 'lunes', 'start_time' => '19:30:00'],
            ['training_area' => 'Clases Grupales', 'name' => 'Body Combat', 'day_of_week' => 'martes', 'start_time' => '19:30:00'],
            ['training_area' => 'Clases Grupales', 'name' => 'Yoga', 'day_of_week' => 'miércoles', 'start_time' => '19:30:00'],
            ['training_area' => 'Clases Grupales', 'name' => 'Body Combat', 'day_of_week' => 'jueves', 'start_time' => '19:30:00'],
            ['training_area' => 'Clases Grupales', 'name' => 'Stretch', 'day_of_week' => 'viernes', 'start_time' => '19:30:00'],
        ];

        foreach ($classes as $class) {
            GroupClass::updateOrCreate(
                [
                    'name' => $class['name'],
                    'day_of_week' => $class['day_of_week'],
                    'start_time' => $class['start_time'],
                ],
                [
                    'training_area_id' => $trainingAreaIds[$class['training_area']],
                    'description' => null,
                    'instructor_name' => null,
                    'end_time' => date('H:i:s', strtotime($class['start_time'].' +1 hour')),
                    'is_active' => true,
                ],
            );
        }
    }
}
