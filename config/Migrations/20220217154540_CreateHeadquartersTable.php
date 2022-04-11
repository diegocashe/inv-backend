<?php

use Migrations\AbstractMigration;

class CreateHeadquartersTable extends AbstractMigration
{
    /**
     * Change Method.
     * @return void
     */
    public function change()
    {
        $table = $this->table(('headquarters'));
        $table
            ->addColumn('name', 'string', [
                'limit' => 100,
                'null' => false
                // UNIQUE
            ])
            ->addColumn('acronym', 'string', [
                'limit' => 10,
                'null' => false
                // UNIQUE
            ])
            ->addColumn('direction', 'string', ['default' => null])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addIndex(['name', 'acronym'], ['unique' => true]);
        $table->save();
    }
}
