<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConsumableColorsFixture
 */
class ConsumableColorsFixture extends TestFixture
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
                'colors' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-06 21:10:15',
                'modified' => '2022-04-06 21:10:15',
            ],
        ];
        parent::init();
    }
}
