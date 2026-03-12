<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Product seed.
 */
class ProductSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'name'    => 'Chair',
                'quantity' => 90,
                'price' => 90,
                'status'    => 'in stock',
                'flag' => 0,
                'last_updated' => date("d-m-Y H:i:s ") . date_default_timezone_get(),
            ],[
                'name'    => 'Table',
                'quantity' => 0,
                'price' => 50,
                'status'    => 'out stock',
                'flag' => 1,
                'last_updated' => date("d-m-Y H:i:s ") . date_default_timezone_get(),
            ],[
                'name'    => 'desk',
                'quantity' => 9,
                'price' => 40,
                'status'    => 'low stock',
                'flag' => 0,
                'last_updated' => date("d-m-Y H:i:s ") . date_default_timezone_get(),
            ],[
                'name'    => 'randomPromo',
                'quantity' => 700,
                'price' => 49,
                'status'    => 'in stock',
                'flag' => 0,
                'last_updated' => date("d-m-Y H:i:s ") . date_default_timezone_get(),
            ],[
                'name'    => 'Food',
                'quantity' => 0,
                'price' => 100,
                'status'    => 'out stock',
                'flag' => 0,
                'last_updated' => date("d-m-Y H:i:s ") . date_default_timezone_get(),
            ],[
                'name'    => 'm155p3113d',
                'quantity' => 5,
                'price' => 1,
                'status'    => 'low stock',
                'flag' => 0,
                'last_updated' => date("d-m-Y H:i:s ") . date_default_timezone_get(),
            ],[
                'name'    => 'Sponge',
                'quantity' => 11,
                'price' => 105,
                'status'    => 'in stock',
                'flag' => 0,
                'last_updated' => date("d-m-Y H:i:s ") . date_default_timezone_get(),
            ],[
                'name'    => 'Shed',
                'quantity' => 900,
                'price' => 900,
                'status'    => 'in stock',
                'flag' => 0,
                'last_updated' => date("d-m-Y H:i:s ") . date_default_timezone_get(),
            ],[
                'name'    => 'Armchair',
                'quantity' => 0,
                'price' => 90,
                'status'    => 'out stock',
                'flag' => 0,
                'last_updated' => date("d-m-Y H:i:s ") . date_default_timezone_get(),
            ],[
                'name'    => 'PromDress',
                'quantity' => 75,
                'price' => 100,
                'status'    => 'in stock',
                'flag' => 0,
                'last_updated' => date("d-m-Y H:i:s ") . date_default_timezone_get(),
            ],
        ];

        $table = $this->table('product');
        $table->insert($data)->save();
    }
}
