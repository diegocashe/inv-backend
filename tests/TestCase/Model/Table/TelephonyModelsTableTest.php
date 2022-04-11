<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TelephonyModelsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TelephonyModelsTable Test Case
 */
class TelephonyModelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TelephonyModelsTable
     */
    protected $TelephonyModels;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TelephonyModels',
        'app.Models',
        'app.TelephonyTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TelephonyModels') ? [] : ['className' => TelephonyModelsTable::class];
        $this->TelephonyModels = $this->getTableLocator()->get('TelephonyModels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TelephonyModels);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TelephonyModelsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TelephonyModelsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
