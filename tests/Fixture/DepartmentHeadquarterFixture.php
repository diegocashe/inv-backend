<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DepartmentHeadquarterFixture
 */
class DepartmentHeadquarterFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'department_headquarter';
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
                'department_id' => 1,
                'headquarters_id' => 1,
                'created' => '2022-04-12 07:43:43',
                'modified' => '2022-04-12 07:43:43',
            ],
        ];
        parent::init();
    }
}
