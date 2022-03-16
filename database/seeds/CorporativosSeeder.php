<?php

use Illuminate\Database\Seeder;

class CorporativosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Corporativos::class, 10)->create();
    }
}
