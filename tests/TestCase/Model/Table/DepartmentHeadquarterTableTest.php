<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmentHeadquarterTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartmentHeadquarterTable Test Case
 */
class DepartmentHeadquarterTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartmentHeadquarterTable
     */
    protected $DepartmentHeadquarter;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DepartmentHeadquarter',
        'app.Departments',
        'app.Headquarters',
        'app.People',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DepartmentHeadquarter') ? [] : ['className' => DepartmentHeadquarterTable::class];
        $this->DepartmentHeadquarter = $this->getTableLocator()->get('DepartmentHeadquarter', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DepartmentHeadquarter);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DepartmentHeadquarterTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DepartmentHeadquarterTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
