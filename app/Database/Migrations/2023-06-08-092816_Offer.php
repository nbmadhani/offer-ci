<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Offer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'coupon' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'expiry_date' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['coupon']);
        $this->forge->createTable('offers');
    }

    public function down()
    {
        $this->forge->dropTable('offers');
    }
}
