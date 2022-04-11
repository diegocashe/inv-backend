<?php

use Migrations\AbstractMigration;

class CreateObservationsTable extends AbstractMigration
{
    /**
     * Change Method.
     * @return void
     */
    public function change()
    {
        $table = $this->table(('observations'));
        $table
            ->addColumn('description', 'text', ['null' => false])
            ->addColumn('allocation_id', 'integer', ['default' => null])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])

            ->addForeignKey('allocation_id', 'allocations', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ]);
        $table->save();
    }
}
