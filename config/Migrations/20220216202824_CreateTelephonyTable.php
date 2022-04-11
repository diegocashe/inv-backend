<?php

use Migrations\AbstractMigration;

class CreateTelephonyTable extends AbstractMigration
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

        $telephonyTypesTable = $this->table('telephony_types');
        $telephonyTypesTable
            ->addColumn('name', 'string', [
                'limit' => 100,
                'null' => false
                // UNIQUE
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addIndex(['name'], ['unique' => true]);
        $telephonyTypesTable->save();

        $telephonyModelsTable = $this->table('telephony_models');
        $telephonyModelsTable
            ->addColumn('model_id', 'integer', ['default' => null])
            ->addColumn('telephony_type_id', 'integer', ['default' => null])
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
            ->addForeignKey('telephony_type_id', 'telephony_types', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addIndex(['model_id'], ['unique' => true]);

        $telephonyModelsTable->save();

        $table = $this->table(('telephony'));
        $table
            ->addColumn('imei', 'string', [
                'limit' => 100,
                'null' => false
                // UNIQUE
            ])
            ->addColumn('imei2', 'string', [
                'limit' => 100,
                'null' => false
                // UNIQUE
            ])
            ->addColumn('item_id', 'integer', ['default' => null])
            ->addColumn('phone_line_id', 'integer', ['default' => null, 'null' => true])
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
            ->addForeignKey('phone_line_id', 'phone_lines', 'id', [
                'delete' => 'SET NULL',
                'update' => 'CASCADE'
            ])
            ->addIndex(['imei2', 'imei', 'item_id'], ['unique' => true]);
        $table->save();
    }
}
