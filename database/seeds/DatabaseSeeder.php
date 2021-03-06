<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(DiallingCodesSeeder::class);
         $this->call(LaratrustSeeder::class);
         $this->call(LaratrustTeamSeeder::class);

        // $this->call(UsersTableSeeder::class);
    }
}
