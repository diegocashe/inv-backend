<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhoneLinesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhoneLinesTable Test Case
 */
class PhoneLinesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PhoneLinesTable
     */
    protected $PhoneLines;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PhoneLines',
        'app.Operators',
        'app.Items',
        'app.Telephony',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PhoneLines') ? [] : ['className' => PhoneLinesTable::class];
        $this->PhoneLines = $this->getTableLocator()->get('PhoneLines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PhoneLines);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PhoneLinesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PhoneLinesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
