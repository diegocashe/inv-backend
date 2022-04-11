<?php
use Migrations\AbstractMigration;

class InsertOperatorsTableDefaultData extends AbstractMigration
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
                'name' => 'MOVISTAR',
                'suffix' => 0414,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'DIGITEL',
                'suffix' => 0412,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'MOVILNET',
                'suffix' => 0416,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
        ];

        $this->table('operators')->insert($data)->save();
    }
}
