<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConsumableModelsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConsumableModelsTable Test Case
 */
class ConsumableModelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConsumableModelsTable
     */
    protected $ConsumableModels;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ConsumableModels',
        'app.PrinterModels',
        'app.Models',
        'app.ConsumableColors',
        'app.ConsumableTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ConsumableModels') ? [] : ['className' => ConsumableModelsTable::class];
        $this->ConsumableModels = $this->getTableLocator()->get('ConsumableModels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ConsumableModels);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ConsumableModelsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ConsumableModelsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
