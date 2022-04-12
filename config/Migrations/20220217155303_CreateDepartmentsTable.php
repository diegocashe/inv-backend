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

        $depHq = $this->table(('department_headquarter'));
        $depHq
            ->addColumn('department_id', 'integer', ['default' => null, 'null'=>true])
            ->addColumn('headquarters_id', 'integer', ['default' => null, 'null'=>true])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addForeignKey('department_id', 'departments', 'id', [
                'delete' => 'SET NULL',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('headquarters_id', 'headquarters', 'id', [
                'delete' => 'SET NULL',
                'update' => 'CASCADE'
            ]);
        $depHq->save();
    }
}
