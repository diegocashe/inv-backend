<?php

use Migrations\AbstractMigration;

class InsertPrintersTypeDefaultData extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $data = [
            [
                'name' => 'TINTA',
                'description' => 'Impresion de tinta común',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'LASER JET',
                'description' => 'Impresion laser',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'PLOTTER',
                'description' => 'Impresion a gran escala',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'MATRIZ DE PUNTO',
                'description' => 'Impresion a gran escala',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
        ];

        $this->table('printer_types')->insert($data)->save();

        $data2 = [
            [
                'name' => 'COLOR',
                'description' => 'Impresión a color',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'BLANCO Y NEGRO',
                'description' => 'Impresión ablanco y negro',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
        ];
        
        $this->table('print_types')->insert($data2)->save();
    }
}
