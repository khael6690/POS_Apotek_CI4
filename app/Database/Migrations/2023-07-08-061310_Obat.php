<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Obat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_obat' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'img' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'default' => 'default.png'
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'satuan' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'produsen' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'harga' => [
                'type'       => 'DOUBLE',
                'default' => 0
            ],
            'discount' => [
                'type'       => 'FLOAT',
                'default' => 0
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_obat', true);
        $this->forge->createTable('obat');
    }

    public function down()
    {
        $this->forge->dropTable('obat');
    }
}
