<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class InsertDepartmentDefaultData extends AbstractMigration
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
                'name' => 'SISTEMAS Y TECNOLOGÍA',
                'description' => 'SISTEMAS Y TECNOLOGIA',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],   
            [
                'name' => 'FAE',
                'description' => 'FAE',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ], 
            [
                'name' => 'TESORERÍA',
                'description' => 'TESORERÍA',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],         
        ];

        $this->table('departments')->insert($data)->save();
    }
}
