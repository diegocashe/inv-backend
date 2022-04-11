<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrinterModelsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrinterModelsTable Test Case
 */
class PrinterModelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrinterModelsTable
     */
    protected $PrinterModels;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PrinterModels',
        'app.Models',
        'app.PrinterTypes',
        'app.ConsumableModels',
        'app.PrintTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PrinterModels') ? [] : ['className' => PrinterModelsTable::class];
        $this->PrinterModels = $this->getTableLocator()->get('PrinterModels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PrinterModels);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PrinterModelsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PrinterModelsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
