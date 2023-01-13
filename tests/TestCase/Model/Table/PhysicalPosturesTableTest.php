<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhysicalPosturesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhysicalPosturesTable Test Case
 */
class PhysicalPosturesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PhysicalPosturesTable
     */
    public $PhysicalPostures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PhysicalPostures',
        'app.Employees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PhysicalPostures') ? [] : ['className' => PhysicalPosturesTable::class];
        $this->PhysicalPostures = TableRegistry::getTableLocator()->get('PhysicalPostures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PhysicalPostures);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
