<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TelephonyTypesFixture
 */
class TelephonyTypesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-06 21:10:30',
                'modified' => '2022-04-06 21:10:30',
            ],
        ];
        parent::init();
    }
}
