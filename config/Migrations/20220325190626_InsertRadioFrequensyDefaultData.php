<?php

use Migrations\AbstractMigration;

class InsertRadioFrequensyDefaultData extends AbstractMigration
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
                'frequency' => '403 - 470',
                'description' => 'frecuencia alta de 403 a 470',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'frequency' => '430 - 470',
                'description' => 'frecuencia alta de 403 a 470',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'frequency' => '430 - 471',
                'description' => 'frecuencia alta de 403 a 470',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],             
        ];

        $this->table('radio_frequencys')->insert($data)->save();
    }
}
