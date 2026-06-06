<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Zone;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comunidades = [
            'Andalucía',
            'Aragón',
            'Principado de Asturias',
            'Islas Baleares',
            'Canarias',
            'Cantabria',
            'Castilla-La Mancha',
            'Castilla y León',
            'Cataluña',
            'Comunidad Valenciana',
            'Extremadura',
            'Galicia',
            'Comunidad de Madrid',
            'Región de Murcia',
            'Comunidad Foral de Navarra',
            'País Vasco',
            'La Rioja',
            'Ceuta',
            'Melilla',
        ];

        foreach ($comunidades as $comunidad) {
            Zone::create(['name' => $comunidad]);
        }
    }
}
