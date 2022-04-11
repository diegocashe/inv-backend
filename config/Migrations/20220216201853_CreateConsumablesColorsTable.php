<?php

use Migrations\AbstractMigration;

class CreateConsumablesColorsTable extends AbstractMigration
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
        $consumableColorTables = $this->table('consumable_colors');
        $consumableColorTables
            ->addColumn('colors', 'string', ['default' => null])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ]);
        $consumableColorTables->save();

        // $table = $this->table(('consumable_codes'));
        // $table
        //     ->addColumn('name', 'string', [
        //         'limit' => 100,
        //         'null' => false,
        //         // UNIQUE
        //     ])
        //     ->addColumn('consumable_color_id', 'integer', ['null' => false])
        //     ->addColumn('description', 'text', ['default' => null])

        //     ->addColumn('created', 'datetime', [
        //         'default' => null,
        //         'null' => false,
        //     ])
        //     ->addColumn('modified', 'datetime', [
        //         'default' => null,
        //         'null' => false,
        //     ])

        //     ->addForeignKey('consumable_color_id', 'consumable_colors', 'id', [
        //         'delete' => 'CASCADE',
        //         'update' => 'CASCADE'
        //     ])
        //     ->addIndex(['name'], ['unique' => true]);
        // // $table->save();
    }
}
