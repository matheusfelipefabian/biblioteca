<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BooksGendersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BooksGendersTable Test Case
 */
class BooksGendersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BooksGendersTable
     */
    protected $BooksGenders;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BooksGenders',
        'app.Books',
        'app.Genders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BooksGenders') ? [] : ['className' => BooksGendersTable::class];
        $this->BooksGenders = TableRegistry::getTableLocator()->get('BooksGenders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BooksGenders);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
