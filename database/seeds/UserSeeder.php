<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();
        DB::table('user')->insert([
            [
                'kode_user' => '1',
                'nama' => 'Fajar Hidayat',
                'telepon' => '087887097020',
            ],

            [
                'kode_user' => '2',
                'nama' => 'Jidan Rosadi',
                'telepon' => '087835343538',
            ],

            [
                'kode_user' => '3',
                'nama' => 'Andi Surandi',
                'telepon' => '0858534857',
            ]

        ]);
    }
}
