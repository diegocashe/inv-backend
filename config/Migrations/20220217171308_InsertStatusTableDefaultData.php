<?php
use Migrations\AbstractMigration;

class InsertStatusTableDefaultData extends AbstractMigration
{
    /**
     * Change Method.
     * @return void
     */
    public function change()
    {
        $data = [
            [
                'name'=> 'ASIGNADO',
                'description'=> 'En condicion de asignado',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
             ],
             [
                'name'=> 'NO ASIGNADO',
                'description'=> 'Disponible, no asignado',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
             ]
        ];

        $this->table('status')->insert($data)->save();
    }
}
