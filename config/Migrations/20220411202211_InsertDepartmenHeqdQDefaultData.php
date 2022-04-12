<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class InsertDepartmenHeqdQDefaultData extends AbstractMigration
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
                'department_id' => 1,
                'headquarters_id' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ], 
            [
                'department_id' => 1,
                'headquarters_id' => 2,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ], 
            [
                'department_id' => 2,
                'headquarters_id' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ], 
            [
                'department_id' => 2,
                'headquarters_id' => 2,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],  
            [
                'department_id' => 3,
                'headquarters_id' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],  
            [
                'department_id' => 3,
                'headquarters_id' => 2,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],          
        ];

        $this->table('department_headquarter')->insert($data)->save(); 
    }
}
