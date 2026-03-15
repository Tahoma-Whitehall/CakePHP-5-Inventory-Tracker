<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductFixture
 */
class ProductFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'product';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id'    => 1,
                'name'    => 'Chair',
                'quantity' => 90,
                'price' => 90,
                'status'    => 'in stock',
                'flag' => 1,
                'last_updated' => date("d-m-Y H:i:s ") . date_default_timezone_get(),
            ],
        ];
        parent::init();
    }
}
