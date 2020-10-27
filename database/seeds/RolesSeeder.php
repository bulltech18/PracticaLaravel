<?php

use Illuminate\Database\Seeder;
use App\Roles;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Roles::class,2)->create();
    }
}
