<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RadioTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RadioTypesTable Test Case
 */
class RadioTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RadioTypesTable
     */
    protected $RadioTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RadioTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RadioTypes') ? [] : ['className' => RadioTypesTable::class];
        $this->RadioTypes = $this->getTableLocator()->get('RadioTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RadioTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RadioTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RadioTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
