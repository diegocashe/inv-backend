<?php

use Migrations\AbstractMigration;

class CreateAllocationsTable extends AbstractMigration
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
        $table = $this->table(('allocations'));
        $table
            ->addColumn('assigment_date', 'datetime', ['null' => false])
            ->addColumn('dispatch_date', 'datetime', ['null' => false])
            ->addColumn('ubication', 'string', ['null' => false])
            ->addColumn('active', 'boolean', ['null' => false, 'default' => true])

            ->addColumn('item_id', 'integer', ['default' => null])
            ->addColumn('assigned_people_id', 'integer', ['default' => null, 'null' => true])
            ->addColumn('assignor_people_id', 'integer', ['default' => null, 'null' => true])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])

            ->addForeignKey('assignor_people_id', 'people', 'id', [
                'delete' => 'SET NULL',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('item_id', 'items', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('assigned_people_id', 'people', 'id', [
                'delete' => 'SET NULL',
                'update' => 'CASCADE'
            ])
            ->addIndex(['item_id'], ['unique' => true]);

        $table->save();
    }
}
