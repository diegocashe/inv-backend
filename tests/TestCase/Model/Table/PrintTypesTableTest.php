<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrintTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrintTypesTable Test Case
 */
class PrintTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrintTypesTable
     */
    protected $PrintTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('PrintTypes') ? [] : ['className' => PrintTypesTable::class];
        $this->PrintTypes = $this->getTableLocator()->get('PrintTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PrintTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PrintTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PrintTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
