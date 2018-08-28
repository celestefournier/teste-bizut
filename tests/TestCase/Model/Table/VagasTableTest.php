<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VagasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VagasTable Test Case
 */
class VagasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VagasTable
     */
    public $Vagas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vagas',
        'app.funcionarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Vagas') ? [] : ['className' => VagasTable::class];
        $this->Vagas = TableRegistry::getTableLocator()->get('Vagas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vagas);

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
