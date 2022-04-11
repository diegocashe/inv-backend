<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HeadquartersFixture
 */
class HeadquartersFixture extends TestFixture
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
                'acronym' => 'Lorem ip',
                'direction' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-06 21:10:17',
                'modified' => '2022-04-06 21:10:17',
            ],
        ];
        parent::init();
    }
}
