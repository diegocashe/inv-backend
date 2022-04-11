<?php

use Migrations\AbstractMigration;

class CreateRadioModelTable extends AbstractMigration
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
        // CREATE RADIO TYPES TABLE
        $radioTypes = $this->table('radio_types');
        $radioTypes
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
        $radioTypes->save();


        // create the radio bands table
        $radioBand =  $this->table(('radio_bands'));
        $radioBand
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
        $radioBand->save();

        // create the frequency table

        $frecuencyTable = $this->table(('radio_frequencys'));
        $frecuencyTable
            ->addColumn('frequency', 'string', [
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
            ->addIndex(['frequency'], ['unique' => true]);
        $frecuencyTable->save();

        // finally will create the radiomodels table

        $table = $this->table(('radio_models'));
        $table
            ->addColumn('model_id', 'integer', ['null' => false])
            ->addColumn('band_id', 'integer', ['null' => false])
            ->addColumn('frecuency_id', 'integer', ['null' => false])
            ->addColumn('radio_types_id', 'integer', ['null' => false])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            // ->addIndex(['model_id'], [
            //     'name' => 'UNIQUE_MODEL',
            //     'unique' => true,
            // ])
            ->addForeignKey('model_id', 'models', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE',
            ])
            ->addForeignKey('radio_types_id', 'radio_types', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('frecuency_id', 'radio_frequencys', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addForeignKey('band_id', 'radio_bands', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->addIndex(['model_id'], ['unique' => true]);

        $table->save();
    }
}
