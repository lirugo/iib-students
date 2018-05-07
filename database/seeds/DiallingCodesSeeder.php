<?php

use Illuminate\Database\Seeder;

class DiallingCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dialling_codes')->insert([
            'name' => 'Ukraine',
            'dialling_code' => '380',
        ]);

        DB::table('dialling_codes')->insert([
            'name' => 'Russia',
            'dialling_code' => '7',
        ]);
    }
}
