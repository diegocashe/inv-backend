<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RadioBandsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RadioBandsTable Test Case
 */
class RadioBandsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RadioBandsTable
     */
    protected $RadioBands;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RadioBands',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RadioBands') ? [] : ['className' => RadioBandsTable::class];
        $this->RadioBands = $this->getTableLocator()->get('RadioBands', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RadioBands);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RadioBandsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RadioBandsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
