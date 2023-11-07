<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan' => 'Mese Hardware',
            'alamat' => 'San Rafael, San Esteban ILocos Sur',
            'telepon' => '09165655013',
            'tipe_nota' => 1, // kecil
            'diskon' => 5,
            'path_logo' => '/img/logo-20231101040245.png            ',
            'path_kartu_member' => '/img/member.png',
        ]);
    }
}
