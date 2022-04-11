<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObservationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObservationsTable Test Case
 */
class ObservationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ObservationsTable
     */
    protected $Observations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Observations',
        'app.Allocations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Observations') ? [] : ['className' => ObservationsTable::class];
        $this->Observations = $this->getTableLocator()->get('Observations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Observations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ObservationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ObservationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
