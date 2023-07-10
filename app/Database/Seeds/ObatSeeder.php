<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ObatSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     'nama' => 'darth',
        //     'deskripsi'    => 'loremasdasdasdsad',
        //     'satuan'    => 1,
        //     'produsen'    => 1,
        //     'harga'    => 1,
        //     'discount'    => 0,
        //     'created_at'    => Time::now(),
        //     'updated_at'    => Time::now(),
        // ];

        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'nama' => $faker->word(),
                'deskripsi'    => $faker->sentence(10),
                'satuan'    => 1,
                'produsen'    => mt_rand(2, 6),
                'harga'    => $faker->randomNumber(5, true),
                'discount'    => mt_rand(0, 100),
                'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'    => Time::now(),
            ];

            // Simple Queries
            // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

            // Using Query Builder
            $this->db->table('obat')->insertBatch($data);
        }
    }
}
