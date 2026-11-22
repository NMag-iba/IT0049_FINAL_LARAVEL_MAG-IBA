<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::updateOrCreate(
            ['name' => 'Sample Rice'],
            [
                'price' => 50.00,
                'stock_quantity' => 25,
                'image' => null,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Canned Sardines'],
            [
                'price' => 35.00,
                'stock_quantity' => 40,
                'image' => null,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Bottled Water'],
            [
                'price' => 20.00,
                'stock_quantity' => 50,
                'image' => null,
            ]
        );
    }
}