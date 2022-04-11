<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TelephonyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TelephonyTable Test Case
 */
class TelephonyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TelephonyTable
     */
    protected $Telephony;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Telephony',
        'app.Items',
        'app.PhoneLines',
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
        $config = $this->getTableLocator()->exists('Telephony') ? [] : ['className' => TelephonyTable::class];
        $this->Telephony = $this->getTableLocator()->get('Telephony', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Telephony);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TelephonyTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TelephonyTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
