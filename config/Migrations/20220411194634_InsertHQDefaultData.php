<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class InsertHQDefaultData extends AbstractMigration
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
                'name' => 'MENE GRANDE',
                'acronym' => 'MN',
                'direction' => 'NORTE DE MARACAIBO',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],   
            [
                'name' => 'TRANSPORTE Y EMBARQUE',
                'acronym' => 'TYE',
                'direction' => 'NORTE DE MARACAIBO',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],        
        ];

        $this->table('headquarters')->insert($data)->save();
    }
}
