<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BooksTable Test Case
 */
class BooksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BooksTable
     */
    protected $Books;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Books',
        'app.Loans',
        'app.Authors',
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
        $config = TableRegistry::getTableLocator()->exists('Books') ? [] : ['className' => BooksTable::class];
        $this->Books = TableRegistry::getTableLocator()->get('Books', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Books);

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
