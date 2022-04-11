<?php
use Migrations\AbstractMigration;

class InsertStateTableDefaultData extends AbstractMigration
{
    /**
     * Change Method.
     * @return void
     */
    public function change()
    {
        $data = [
            [
                'name'=> 'OPERATIVO',
                'description'=> 'En condiciones de uso',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
             ],
             [
                'name'=> 'FUERA DE SERVICIO',
                'description'=> 'Sus condiciones no son optimas para el uso',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
             ],
             [
                'name'=> 'FALTA DE CONSUMIBLE',
                'description'=> 'No tiene consumible para funcionar',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
             ]
        ];

        $this->table('states')->insert($data)->save();
    }
}
