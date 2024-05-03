<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $turnos = [
            ['descripcion' => 'Mañana'],
            ['descripcion' => 'Tarde'],
            ['descripcion' => 'Noche'],
        ];

        foreach ($turnos as $turno) {
            \App\Models\Turno::firstOrCreate($turno);
        }
    }
}
