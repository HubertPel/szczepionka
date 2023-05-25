<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Hubert',
                'surname' => 'Pełechaty',
                'email' => 'hubert@admin.pl',
                'type' => 'admin',
                'password' => '$2y$10$F2mKfF.qhwNFsHdq7VCsoeOfeuvos/F4qXj/yhlquYyjwTh6RwQaC',
                'birthdate' => '1111-11-11'
            ],
            [
                'name' => 'Wojciech',
                'surname' => 'Paciej',
                'email' => 'wojtek@admin.pl',
                'type' => 'admin',
                'password' => '$2y$10$F2mKfF.qhwNFsHdq7VCsoeOfeuvos/F4qXj/yhlquYyjwTh6RwQaC',
                'birthdate' => '1111-11-11'
            ],
            [
                'name' => 'Sebastian',
                'surname' => 'Piechowski',
                'email' => 'sebastian@admin.pl',
                'type' => 'admin',
                'password' => '$2y$10$F2mKfF.qhwNFsHdq7VCsoeOfeuvos/F4qXj/yhlquYyjwTh6RwQaC',
                'birthdate' => '1111-11-11'
            ],
        ]);
    }
}
