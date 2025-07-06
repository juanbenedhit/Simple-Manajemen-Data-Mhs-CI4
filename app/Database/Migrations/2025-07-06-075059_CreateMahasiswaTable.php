<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswaTable extends Migration
{
    public function up()
    {
        // Mendefinisikan struktur tabel mahasiswa
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nim' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jurusan' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'angkatan' => [
                'type'       => 'INT',
                'constraint' => 4,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Menjadikan 'id' sebagai primary key
        $this->forge->addKey('id', true);

        // Membuat tabel mahasiswa
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        // Menghapus tabel mahasiswa jika migrasi dibatalkan
        $this->forge->dropTable('mahasiswa');
    }
}