<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PhoneLinesFixture
 */
class PhoneLinesFixture extends TestFixture
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
                'number' => 'Lorem ipsum dolor sit amet',
                'imsi' => 'Lorem ipsum dolor sit amet',
                'sim_card' => 'Lorem ipsum dolor sit amet',
                'operator_id' => 1,
                'item_id' => 1,
                'created' => '2022-04-06 21:10:21',
                'modified' => '2022-04-06 21:10:21',
            ],
        ];
        parent::init();
    }
}
