<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConsumableTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConsumableTypesTable Test Case
 */
class ConsumableTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConsumableTypesTable
     */
    protected $ConsumableTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ConsumableTypes',
        'app.ConsumableModels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ConsumableTypes') ? [] : ['className' => ConsumableTypesTable::class];
        $this->ConsumableTypes = $this->getTableLocator()->get('ConsumableTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ConsumableTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ConsumableTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ConsumableTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
