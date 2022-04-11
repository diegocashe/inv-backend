<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RadioFrequencysTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RadioFrequencysTable Test Case
 */
class RadioFrequencysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RadioFrequencysTable
     */
    protected $RadioFrequencys;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RadioFrequencys',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RadioFrequencys') ? [] : ['className' => RadioFrequencysTable::class];
        $this->RadioFrequencys = $this->getTableLocator()->get('RadioFrequencys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RadioFrequencys);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RadioFrequencysTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RadioFrequencysTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
