<?php

use Migrations\AbstractMigration;

class CreateItemTypeTable extends AbstractMigration
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
        $table = $this->table('item_types');
        $table
            ->addColumn('name', 'string', [
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('description', 'text', ['default' => null])
            ->addColumn('scope', 'string', [
                'limit' => 100,
                'null' => false
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
        $table->save();
    }
}
