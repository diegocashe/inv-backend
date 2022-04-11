<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OperatorsFixture
 */
class OperatorsFixture extends TestFixture
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
                'suffix' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-06 21:10:20',
                'modified' => '2022-04-06 21:10:20',
            ],
        ];
        parent::init();
    }
}
