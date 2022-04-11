<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TelephonyTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TelephonyTypesTable Test Case
 */
class TelephonyTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TelephonyTypesTable
     */
    protected $TelephonyTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TelephonyTypes',
        'app.TelephonyModels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TelephonyTypes') ? [] : ['className' => TelephonyTypesTable::class];
        $this->TelephonyTypes = $this->getTableLocator()->get('TelephonyTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TelephonyTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TelephonyTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TelephonyTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
