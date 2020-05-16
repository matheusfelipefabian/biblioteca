<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BooksAuthorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BooksAuthorsTable Test Case
 */
class BooksAuthorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BooksAuthorsTable
     */
    protected $BooksAuthors;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BooksAuthors',
        'app.Authors',
        'app.Books',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BooksAuthors') ? [] : ['className' => BooksAuthorsTable::class];
        $this->BooksAuthors = TableRegistry::getTableLocator()->get('BooksAuthors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BooksAuthors);

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
