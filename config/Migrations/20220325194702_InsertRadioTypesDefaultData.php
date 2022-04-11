<?php
use Migrations\AbstractMigration;

class InsertRadioTypesDefaultData extends AbstractMigration
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
                'name' => 'PORTATIL',
                'description' => 'Radio trasladable',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'BASE MOVIL',
                'description' => 'Radio de base movil y trasladable',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'REPETIDOR',
                'description' => 'Repite la señal y aumenta el alcance de radio',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ]          
        ];

        $this->table('radio_types')->insert($data)->save();
    }
}
