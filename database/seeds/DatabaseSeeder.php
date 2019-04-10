<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Type::class, 1)->create();
        factory(App\Raspberry::class, 1)->create();
        factory(App\Sensor::class, 1)->create();
        factory(App\Record::class, 200)->create();
    }
}
