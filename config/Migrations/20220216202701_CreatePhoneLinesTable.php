<?php

use Migrations\AbstractMigration;

class CreatePhoneLinesTable extends AbstractMigration
{
    /**
     * Change Method.
     * @return void
     */
    public function change()
    {
        $table = $this->table(('phone_lines'));
        $table
            ->addColumn('number', 'string', [
                'limit' => 100,
                'null' => false
                // UNIQUE
            ])
            ->addColumn('imsi', 'string', [
                'limit' => 100,
                'null' => false
                // UNIQUE
            ])
            ->addColumn('sim_card', 'string', [
                'limit' => 100,
                'null' => false
                // UNIQUE
            ])
            ->addColumn('operator_id', 'integer', ['default' => null])
            ->addColumn('item_id', 'integer', ['default' => null])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])

            ->addForeignKey('operator_id', 'operators', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('item_id', 'items', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addIndex(['sim_card', 'imsi', 'number','item_id'], ['unique' => true]);
        $table->save();
    }
}
