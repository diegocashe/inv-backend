<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExtraRowsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExtraRowsTable Test Case
 */
class ExtraRowsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExtraRowsTable
     */
    protected $ExtraRows;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ExtraRows',
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
        $config = $this->getTableLocator()->exists('ExtraRows') ? [] : ['className' => ExtraRowsTable::class];
        $this->ExtraRows = $this->getTableLocator()->get('ExtraRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ExtraRows);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExtraRowsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExtraRowsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
