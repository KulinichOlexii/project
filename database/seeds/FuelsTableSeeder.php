<?php

use Illuminate\Database\Seeder;

class FuelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Fuel::class, 20)->create();
    }
}
