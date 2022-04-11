<?php
use Migrations\AbstractMigration;

class InsertConsumableColorsDefaultData extends AbstractMigration
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
                'colors' => 'COLOR',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'colors' => 'BLANCO Y NEGRO',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ]         
        ];

        $this->table('consumable_colors')->insert($data)->save();
    }
}
