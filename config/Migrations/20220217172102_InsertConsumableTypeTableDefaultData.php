<?php
use Migrations\AbstractMigration;

class InsertConsumableTypeTableDefaultData extends AbstractMigration
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
                'name' => 'CINTA',
                'description' => 'CINTA',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'TONER',
                'description' => 'TONER',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'KIT FUSOR DE IMAGEN',
                'description' => 'KIT FUSOR DE IMAGEN',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
        ];

        $this->table('consumable_types')->insert($data)->save();
    }
}
