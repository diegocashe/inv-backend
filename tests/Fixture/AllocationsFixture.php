<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AllocationsFixture
 */
class AllocationsFixture extends TestFixture
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
                'assigment_date' => '2022-04-06 21:10:09',
                'dispatch_date' => '2022-04-06 21:10:09',
                'ubication' => 'Lorem ipsum dolor sit amet',
                'active' => 1,
                'assigned_people_id' => 1,
                'item_id' => 1,
                'assignor_user_id' => 1,
                'created' => '2022-04-06 21:10:09',
                'modified' => '2022-04-06 21:10:09',
            ],
        ];
        parent::init();
    }
}
