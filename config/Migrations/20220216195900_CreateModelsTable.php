<?php

use Migrations\AbstractMigration;

class CreateModelsTable extends AbstractMigration
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
        $table = $this->table(('models'));
        $table
            ->addColumn('code', 'string', [
                'limit' => 100,
                'null' => false
                //unique
            ])
            ->addColumn('brand_id', 'integer', ['null' => false])
            ->addColumn('item_type_id', 'integer', ['null' => false])
            ->addColumn('description', 'text', ['default' => null])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])

            ->addForeignKey('item_type_id', 'item_types', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('brand_id', 'brands', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addIndex(['code'], ['unique' => true]);
        $table->save();
    }
}
