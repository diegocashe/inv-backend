<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModelsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModelsTable Test Case
 */
class ModelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ModelsTable
     */
    protected $Models;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Models',
        'app.Brands',
        'app.ItemTypes',
        'app.ConsumableModels',
        'app.Items',
        'app.PrinterModels',
        'app.RadioModels',
        'app.Telephony',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Models') ? [] : ['className' => ModelsTable::class];
        $this->Models = $this->getTableLocator()->get('Models', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Models);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ModelsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ModelsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
