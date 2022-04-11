<?php
use Migrations\AbstractMigration;

class InsertRadioBandsDefaultData extends AbstractMigration
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
                'name' => 'UHF',
                'description' => 'frecuencia alta de 403 a 470',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'VHF',
                'description' => 'frecuencia alta de 403 a 470',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'VHF - UHF',
                'description' => 'frecuencia alta de 403 a 470',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],             
        ];

        $this->table('radio_bands')->insert($data)->save();
    }
}
