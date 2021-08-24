<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatalogosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatalogosTable Test Case
 */
class CatalogosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CatalogosTable
     */
    public $Catalogos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Catalogos',
        'app.Useres',
        'app.Status',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Catalogos') ? [] : ['className' => CatalogosTable::class];
        $this->Catalogos = TableRegistry::getTableLocator()->get('Catalogos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Catalogos);

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
