<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BrandSeeder::class);
        $this->call(MaterialSeeder::class);
        $this->call(CompoundSeeder::class);

        $products = [
            [
                'name' => 'Рубашка',
                'price' => 1000,
                'productable_type' => 'material',
                'productable_id' => 1
            ],
            [
                'name' => 'Кепка',
                'price' => 209,
                'productable_type' => 'material',
                'productable_id' => 2
            ],
            [
                'name' => 'Торт',
                'price' => 500,
                'productable_type' => 'compound',
                'productable_id' => 1
            ],
            [
                'name' => 'Пирожок',
                'price' => 100,
                'productable_type' => 'compound',
                'productable_id' => 2
            ],
            [
                'name' => 'Телефон',
                'price' => 5000,
                'productable_type' => 'brand',
                'productable_id' => 1
            ],
            [
                'name' => 'Ноутбук',
                'price' => 1000,
                'productable_type' => 'brand',
                'productable_id' => 2
            ]
        ];

        foreach ($products as $product) {
            Product::updateOrCreate($product);
        }
    }
}
