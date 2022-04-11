<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrintersConsumablesAssigmentFixture
 */
class PrintersConsumablesAssigmentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'printers_consumables_assigment';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'item_id' => 1,
                'consumable_assigned_id' => 1,
                'created' => '2022-04-06 21:10:23',
                'modified' => '2022-04-06 21:10:23',
            ],
        ];
        parent::init();
    }
}
