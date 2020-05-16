<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PenaltiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PenaltiesTable Test Case
 */
class PenaltiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PenaltiesTable
     */
    protected $Penalties;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Penalties',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Penalties') ? [] : ['className' => PenaltiesTable::class];
        $this->Penalties = TableRegistry::getTableLocator()->get('Penalties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Penalties);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
