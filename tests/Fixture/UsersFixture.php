<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'active' => 1,
                'people_id' => 1,
                'rol_id' => 1,
                'created' => '2022-04-06 21:10:32',
                'modified' => '2022-04-06 21:10:32',
            ],
        ];
        parent::init();
    }
}
