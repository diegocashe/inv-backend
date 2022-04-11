<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RadioModelsFixture
 */
class RadioModelsFixture extends TestFixture
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
                'band_id' => 1,
                'frecuency_id' => 1,
                'radio_types_id' => 1,
                'created' => '2022-04-06 21:10:27',
                'modified' => '2022-04-06 21:10:27',
            ],
        ];
        parent::init();
    }
}
