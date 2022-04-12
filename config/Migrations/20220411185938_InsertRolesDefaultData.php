<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class InsertRolesDefaultData extends AbstractMigration
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
                'name' => 'ADMIN',
                'description' => 'administrador de la aplicacion con todos los permisos',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],   
            [
                'name' => 'SUPPORT',
                'description' => 'servicio de soporte de la empresa encargado de administrar el inventario',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],   
            [
                'name' => 'REGULAR',
                'description' => 'Personal externo a la aplicacion a quien se le adjudican los items',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],         
        ];

        $this->table('roles')->insert($data)->save();
    }
}
