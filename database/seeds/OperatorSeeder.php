<?php

use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operator')->delete();
        DB::table('operator')->insert([
            [
                'kode_operator' => '1',
                'nama' => 'ryan',
                'password' => bcrypt('admin'),
            ],

            [
                'kode_operator' => '2',
                'nama' => 'yoga',
                'password' => bcrypt('admin'),
            ],

            [
                'kode_operator' => '3',
                'nama' => 'bams',
                'password' => bcrypt('admin'),
            ]

        ]);
    }
}
