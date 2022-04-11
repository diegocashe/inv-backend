<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrinterModelsFixture
 */
class PrinterModelsFixture extends TestFixture
{
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
                'model_id' => 1,
                'printer_type_id' => 1,
                'consumable_id' => 1,
                'print_types_id' => 1,
                'created' => '2022-04-06 21:10:22',
                'modified' => '2022-04-06 21:10:22',
            ],
        ];
        parent::init();
    }
}
