<?php

use Migrations\AbstractMigration;

class CreateItemsTable extends AbstractMigration
{
    /**
     * Change Method.
     * @return void
     */
    public function change()
    {
        $table = $this->table('items');
        $table
            ->addColumn('serial', 'string', [
                'limit' => 100,
                'null' => false
                //UNIQUE
            ])
            ->addColumn('active_code', 'string', [
                'limit' => 100,
                'default' => null
                //UNIQUE
            ])
            ->addColumn('model_id', 'integer', ['null' => false])
            ->addColumn('state_id', 'integer', ['null' => false])
            // ->addColumn('status_id', 'integer', ['null' => false])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])

            ->addForeignKey('model_id', 'models', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('state_id', 'states', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            // ->addForeignKey('status_id', 'status', 'id', [
            //     'delete' => 'CASCADE',
            //     'update' => 'CASCADE'
            // ])
            ->addIndex(['active_code', 'serial'], ['unique' => true]);

        $table->save();
    }
}
