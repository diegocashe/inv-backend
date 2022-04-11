<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItemsFixture
 */
class ItemsFixture extends TestFixture
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
                'serial' => 'Lorem ipsum dolor sit amet',
                'active_code' => 'Lorem ipsum dolor sit amet',
                'model_id' => 1,
                'state_id' => 1,
                'created' => '2022-04-06 21:10:18',
                'modified' => '2022-04-06 21:10:18',
            ],
        ];
        parent::init();
    }
}
