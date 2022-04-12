<?php

use Migrations\AbstractMigration;

class CreatePeopleTable extends AbstractMigration
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
        $table = $this->table(('people'));
        $table
            ->addColumn('first_name', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('last_name', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('email', 'string', ['default' => null, 'null' => true])
            ->addColumn('nacional_identify', 'string', ['null' => true]) //unique

            ->addColumn('position_id', 'integer', ['default' => null, 'null' => true])
            ->addColumn('user_id', 'integer', ['default' => null, 'null' => false])
            ->addColumn('department_headquarter_id', 'integer', ['default' => null, 'null' => true])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addForeignKey('position_id', 'positions', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('user_id', 'users', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('department_headquarter_id', 'department_headquarter', 'id', [
                'delete' => 'SET NULL',
                'update' => 'CASCADE'
            ])
            ->addIndex(['email', 'nacional_identify'], ['unique' => true])
            ->addIndex(['user_id'], ['unique' => true]);
        $table->save();
    }
}
