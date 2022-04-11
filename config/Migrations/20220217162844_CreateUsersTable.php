<?php

use Migrations\AbstractMigration;

class CreateUsersTable extends AbstractMigration
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
        $table = $this->table(('users'));
        $table
            ->addColumn('username', 'string', ['null' => false]) //unique
            ->addColumn('password', 'string', ['null' => false])
            ->addColumn('active', 'boolean', ['default' => true])

            ->addColumn('people_id', 'integer', ['default' => null])
            ->addColumn('rol_id', 'integer', ['default' => null])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])

            ->addForeignKey('rol_id', 'roles', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('people_id', 'people', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addIndex(['username'], ['unique' => true]);
        $table->save();
    }
}
