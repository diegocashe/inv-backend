<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class InsertPositionsDefaultData extends AbstractMigration
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
                'name' => 'Analista',
                'description' => 'analista nivel bajo',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],   
            [
                'name' => 'Líder',
                'description' => 'lider de nivel medio',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ], 
            [
                'name' => 'Jefe de unidad',
                'description' => 'jefe comandante de unidad',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],         
        ];

        $this->table('positions')->insert($data)->save(); 
    }
}
