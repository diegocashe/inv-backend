<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RadioModelsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RadioModelsTable Test Case
 */
class RadioModelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RadioModelsTable
     */
    protected $RadioModels;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RadioModels',
        'app.Models',
        'app.RadioBands',
        'app.RadioFrequencys',
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
        $config = $this->getTableLocator()->exists('RadioModels') ? [] : ['className' => RadioModelsTable::class];
        $this->RadioModels = $this->getTableLocator()->get('RadioModels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RadioModels);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RadioModelsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RadioModelsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
