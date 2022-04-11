<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TelephonyFixture
 */
class TelephonyFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'telephony';
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
                'imei' => 'Lorem ipsum dolor sit amet',
                'imei2' => 'Lorem ipsum dolor sit amet',
                'item_id' => 1,
                'phone_line_id' => 1,
                'created' => '2022-04-06 21:10:29',
                'modified' => '2022-04-06 21:10:29',
            ],
        ];
        parent::init();
    }
}
