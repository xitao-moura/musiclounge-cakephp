<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MateriasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MateriasTable Test Case
 */
class MateriasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MateriasTable
     */
    public $Materias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Materias',
        'app.Users',
        'app.Status',
        'app.Tipos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Materias') ? [] : ['className' => MateriasTable::class];
        $this->Materias = TableRegistry::getTableLocator()->get('Materias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Materias);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
