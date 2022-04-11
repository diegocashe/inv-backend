<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PeopleFixture
 */
class PeopleFixture extends TestFixture
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
                'first_name_1' => 'Lorem ipsum dolor sit amet',
                'first_name_2' => 'Lorem ipsum dolor sit amet',
                'last_name_1' => 'Lorem ipsum dolor sit amet',
                'last_name_2' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'nacional_identify' => 'Lorem ipsum dolor sit amet',
                'department_id' => 1,
                'position_id' => 1,
                'created' => '2022-04-06 21:10:21',
                'modified' => '2022-04-06 21:10:21',
            ],
        ];
        parent::init();
    }
}
