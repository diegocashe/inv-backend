<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemTypesTable Test Case
 */
class ItemTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemTypesTable
     */
    protected $ItemTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ItemTypes',
        'app.Models',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ItemTypes') ? [] : ['className' => ItemTypesTable::class];
        $this->ItemTypes = $this->getTableLocator()->get('ItemTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ItemTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ItemTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ItemTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
