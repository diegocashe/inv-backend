<?php

use Migrations\AbstractMigration;

class CreateStateTable extends AbstractMigration
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
        $table = $this->table(('states'));
        $table
            ->addColumn('name', 'string', [
                'limit' => 100,
                'null' => false,
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
