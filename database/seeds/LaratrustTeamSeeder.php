<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaratrustTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name' => 'team',
            'display_name' => 'Team name',
            'description' => 'Team description',
        ]);
        DB::table('role_user')->insert([
            'role_id' => '6',
            'user_id' => '6',
            'user_type' => 'App\User',
            'team_id' => '1',
        ]);
    }
}
