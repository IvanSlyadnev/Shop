<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['Samsung', 'Apple', 'Huawei', 'Honor'];

        foreach ($brands as $brand) {
            Brand::create(['name' => $brand]);
        }
    }
}
