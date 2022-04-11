<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConsumableModelsFixture
 */
class ConsumableModelsFixture extends TestFixture
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
                'consumable_color_id' => 1,
                'consumable_type_id' => 1,
                'created' => '2022-04-10 14:59:27',
                'modified' => '2022-04-10 14:59:27',
            ],
        ];
        parent::init();
    }
}
