<?php

use Migrations\AbstractMigration;

class CreatePrintersTable extends AbstractMigration
{
    /**
     * Change Method.
     * @return void
     */
    public function change()
    {
        $table = $this->table('printers_consumables_assigment');
        $table
            ->addColumn('item_id', 'integer', ['null' => false])
            ->addColumn('consumable_assigned_id', 'integer', ['default' => null])

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
            ])
            ->addForeignKey('consumable_assigned_id', 'items', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addIndex(['consumable_assigned_id', 'item_id'], ['unique' => true]);
        $table->save();

        $PrinterModelTable = $this->table('printer_models');
        $PrinterModelTable
            ->addColumn('model_id', 'integer', ['default' => null])

            ->addColumn('printer_type_id', 'integer', ['null' => false])
            ->addColumn('consumable_id', 'integer', ['null' => true, 'default' => null])
            ->addColumn('print_types_id', 'integer', ['null' => false])

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
            ->addForeignKey('printer_type_id', 'printer_types', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('consumable_id', 'consumable_models', 'id', [
                'delete' => 'SET NULL',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('print_types_id', 'print_types', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addIndex(['model_id'], ['unique' => true]);
        $PrinterModelTable->save();
    }
}
