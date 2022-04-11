<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TelephonyModelsFixture
 */
class TelephonyModelsFixture extends TestFixture
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
                'telephony_type_id' => 1,
                'created' => '2022-04-06 21:10:30',
                'modified' => '2022-04-06 21:10:30',
            ],
        ];
        parent::init();
    }
}
