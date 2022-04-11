<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HeadquartersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HeadquartersTable Test Case
 */
class HeadquartersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HeadquartersTable
     */
    protected $Headquarters;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Headquarters',
        'app.Departments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Headquarters') ? [] : ['className' => HeadquartersTable::class];
        $this->Headquarters = $this->getTableLocator()->get('Headquarters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Headquarters);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HeadquartersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\HeadquartersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
