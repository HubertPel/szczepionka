<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            array('city' => 'Warszawa'),
            array('city' => 'Kraków'),
            array('city' => 'Łódź'),
            array('city' => 'Wrocław'),
            array('city' => 'Poznań'),
            array('city' => 'Gdańsk'),
            array('city' => 'Szczecin'),
            array('city' => 'Bydgoszcz'),
            array('city' => 'Lublin'),
            array('city' => 'Katowice'),
            array('city' => 'Białystok'),
            array('city' => 'Gdynia'),
            array('city' => 'Częstochowa'),
            array('city' => 'Radom'),
            array('city' => 'Sosnowiec'),
            array('city' => 'Toruń'),
            array('city' => 'Kielce'),
            array('city' => 'Rzeszów'),
            array('city' => 'Gliwice'),
            array('city' => 'Zabrze'),
            array('city' => 'Olsztyn'),
            array('city' => 'Bielsko-Biała'),
            array('city' => 'Bytom'),
            array('city' => 'Ruda Śląska'),
            array('city' => 'Tychy'),
            array('city' => 'Opole'),
            array('city' => 'Gorzów Wielkopolski'),
            array('city' => 'Elbląg'),
            array('city' => 'Płock'),
            array('city' => 'Wałbrzych')
        ]);
    }
}
