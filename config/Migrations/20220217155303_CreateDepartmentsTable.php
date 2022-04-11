<?php

use Migrations\AbstractMigration;

class CreateDepartmentsTable extends AbstractMigration
{
    /**
     * Change Method.
     * @return void
     */
    public function change()
    {

        $table = $this->table(('departments'));
        $table
            ->addColumn('name', 'string', [
                'limit' => 100,
                'null' => false
                // UNIQUE
            ])
            ->addColumn('description', 'text', ['default' => null])
            ->addColumn('headquarters_id', 'integer', ['null' => false])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addForeignKey('headquarters_id', 'headquarters', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addIndex(['name'], ['unique' => true]);
        $table->save();
    }
}
