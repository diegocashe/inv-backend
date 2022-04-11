<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrinterTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrinterTypesTable Test Case
 */
class PrinterTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrinterTypesTable
     */
    protected $PrinterTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PrinterTypes',
        'app.PrinterModels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PrinterTypes') ? [] : ['className' => PrinterTypesTable::class];
        $this->PrinterTypes = $this->getTableLocator()->get('PrinterTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PrinterTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PrinterTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PrinterTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
