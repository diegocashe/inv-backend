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
            ->addColumn('first_name_1', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('first_name_2', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('last_name_1', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('last_name_2', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('email', 'string', ['default' => null])
            ->addColumn('nacional_identify', 'string', ['null' => false]) //unique

            ->addColumn('department_id', 'integer', ['default' => null])
            ->addColumn('position_id', 'integer', ['default' => null])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])


            ->addForeignKey('department_id', 'departments', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('position_id', 'positions', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addIndex(['email', 'nacional_identify'], ['unique' => true]);
        $table->save();
    }
}
