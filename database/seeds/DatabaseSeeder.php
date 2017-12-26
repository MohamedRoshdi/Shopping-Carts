<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
            'cart_name' => 'Order Cart',
        ]);
        DB::table('carts')->insert([
            'cart_name' => 'Wish List Cart',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Camera',
            'product_photo' => 'camera.jpg',
            'product_type' => 'Normal Item',
            'product_price' => '200',
        ]);
        DB::table('products')->insert([
            'product_name' => 'Hard',
            'product_photo' => 'external-hard-drive.jpg',
            'product_type' => 'Sale Item',
            'product_price' => '360',
        ]);
        DB::table('products')->insert([
            'product_name' => 'Watch',
            'product_photo' => 'watch.jpg',
            'product_type' => 'Normal Item',
            'product_price' => '150',
        ]);
    }
}
