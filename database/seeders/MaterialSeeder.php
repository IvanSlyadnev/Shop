<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::create([
            'color' => substr(md5(rand()), 0, 6),
            'size' => random_int(35, 50)
        ]);
        Material::create([
            'color' => substr(md5(rand()), 0, 6),
            'size' => random_int(35, 50)
        ]);
    }
}
