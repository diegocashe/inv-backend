<?php

use Migrations\AbstractMigration;

class CreatePositionsTable extends AbstractMigration
{
    /**
     * Change Method.
     * @return void
     */
    public function change()
    {
        $table = $this->table(('positions'));
        $table
            ->addColumn('name', 'string', [
                'limit' => 100,
                'null' => false
                // UNIQUE
            ])
            ->addColumn('description', 'text', ['default' => null])

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
