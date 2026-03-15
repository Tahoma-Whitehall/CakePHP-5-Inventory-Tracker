<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductTable Test Case
 */
class ProductTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductTable
     */
    protected $ProductTable;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Product',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Product') ? [] : ['className' => ProductTable::class];
        $this->ProductTable = $this->getTableLocator()->get('Product', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProductTable);

        parent::tearDown();
    }

    /**
     * Test
     *
     * @return void
     * @link
     */
    public function testTableContains(): void
    {
        $query = $this->ProductTable->find('all')->select(['id', 'name']);
        $this->assertInstanceOf('Cake\ORM\Query\SelectQuery', $query);
        $result = $query->enableHydration(false)->toArray();
        $expected = [
            ['id' => 1, 'name' => 'Chair'],
        ];
        $this->assertArrayIsEqualToArrayOnlyConsideringListOfKeys($expected, $result,['id','name']);

    }
}
