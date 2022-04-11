<?php

use Migrations\AbstractMigration;

class CreateConsumablesTable extends AbstractMigration
{
    /**
     * Change Method.
     * @return void
     */
    public function change()
    {
        $table = $this->table(('consumable_models'));
        $table
            ->addColumn('model_id', 'integer', ['default' => null])
            ->addColumn('consumable_color_id', 'integer', ['null' => false])
            ->addColumn('consumable_type_id', 'integer', ['null' => false])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])

            ->addForeignKey('consumable_type_id', 'consumable_types', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('consumable_color_id', 'consumable_colors', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('model_id', 'models', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addIndex(['model_id'], ['unique' => true]);
        $table->save();
    }
}
