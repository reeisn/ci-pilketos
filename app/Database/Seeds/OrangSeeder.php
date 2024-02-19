<?php

namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;

class OrangSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'nama'      => 'Sania',
            'alamat'    => 'Bogor',
            'created_at'=> Time::now(),
            'updated_at'=> Time::now()
        ];

        //simple queries
        // $this->db->query(
        //     "INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)",
        //     $data
        // );

        //using query builder
        // $this->db->table('orang')->insert($data);
        $this->db->table('orang')->insertBatch($data);
    }
}