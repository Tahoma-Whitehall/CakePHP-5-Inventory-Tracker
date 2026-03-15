<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ProductController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ProductController Test Case
 *
 * @link \App\Controller\ProductController
 */
class ProductControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Product',
    ];

    /**
     * Test index method
     *
     * @return void
     * @link \App\Controller\ProductController::index()
     */
    public function testIndex(): void
    {
        $data = [
            'name_search'    => 'Chair',
            'filter'    => '',
            'Delete_Flagged' => 1,
        ];
        
        $articles = $this->getTableLocator()->get('Product');
        $query = $articles->find()->where(['name' => $data['name_search']]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test view method
     *
     * @return void
     * @link \App\Controller\ProductController::view()
     */
    public function testView(): void
    {
        $this->get('/product/view');

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     * @link \App\Controller\ProductController::add()
     */
    public function testAdd(): void
    {
        $this->get('/product/add');

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     * @link \App\Controller\ProductController::edit()
     */
    public function testEdit(): void
    {
        $this->get('/product/edit');

        $this->assertResponseOk();
    }

}
