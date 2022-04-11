<?php

use Migrations\AbstractMigration;

class CreateExtraRowsTable extends AbstractMigration
{
    /**
     * Change Method.
     * @return void
     */
    public function change()
    {

        $table = $this->table('extra_rows');
        $table
            ->addColumn('name', 'string', [
                'limit' => 100,
                'null' => false
            ])
            ->addColumn('description', 'text', ['default' => null])
            ->addColumn('item_id', 'integer')

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])

            ->addForeignKey('item_id', 'items', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ]);

        $table->save();
    }
}
