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
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'nacional_identify' => 'Lorem ipsum dolor sit amet',
                'position_id' => 1,
                'user_id' => 1,
                'department_headquarter_id' => 1,
                'created' => '2022-04-12 06:03:31',
                'modified' => '2022-04-12 06:03:31',
            ],
        ];
        parent::init();
    }
}
