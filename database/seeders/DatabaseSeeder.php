<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Admin::factory(10)->create();

        // $this->call(AdminsTableSeeder::class);
        // $this->call(SectionsTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
    }
}
