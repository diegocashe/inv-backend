<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrintersConsumablesAssigmentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrintersConsumablesAssigmentTable Test Case
 */
class PrintersConsumablesAssigmentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrintersConsumablesAssigmentTable
     */
    protected $PrintersConsumablesAssigment;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PrintersConsumablesAssigment',
        'app.Items',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PrintersConsumablesAssigment') ? [] : ['className' => PrintersConsumablesAssigmentTable::class];
        $this->PrintersConsumablesAssigment = $this->getTableLocator()->get('PrintersConsumablesAssigment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PrintersConsumablesAssigment);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PrintersConsumablesAssigmentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PrintersConsumablesAssigmentTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
