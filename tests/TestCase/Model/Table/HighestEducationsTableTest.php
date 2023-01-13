<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HighestEducationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HighestEducationsTable Test Case
 */
class HighestEducationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HighestEducationsTable
     */
    public $HighestEducations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.HighestEducations',
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
        $config = TableRegistry::getTableLocator()->exists('HighestEducations') ? [] : ['className' => HighestEducationsTable::class];
        $this->HighestEducations = TableRegistry::getTableLocator()->get('HighestEducations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HighestEducations);

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
