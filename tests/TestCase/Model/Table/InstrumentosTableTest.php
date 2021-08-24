<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstrumentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstrumentosTable Test Case
 */
class InstrumentosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InstrumentosTable
     */
    public $Instrumentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Instrumentos',
        'app.Marcas',
        'app.Modelos',
        'app.Categorias',
        'app.Origens',
        'app.Status',
        'app.Historicos',
        'app.Imagens',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Instrumentos') ? [] : ['className' => InstrumentosTable::class];
        $this->Instrumentos = TableRegistry::getTableLocator()->get('Instrumentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Instrumentos);

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
