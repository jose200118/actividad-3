<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jornada;
use App\Models\Programas;
use faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Jornada::factory(100)->create();
        \App\Models\Programa::factory(100)->create();
    }
}
