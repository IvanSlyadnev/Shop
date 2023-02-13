<?php

namespace Database\Seeders;

use App\Models\Compound;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $compositions = [
            [
                [
                    'name' => 'Мука',
                    'count' => 100,
                ],
                [
                    'name' => 'Масло',
                    'count' => 20
                ],
                [
                    'name' => 'Сахар',
                    'count' => 50
                ]
            ],
            [
                [
                    'name' => 'яйца',
                    'count' => 20
                ],
                [
                    'name' => 'перец',
                    'count' => 10
                ],
                [
                    'name' => 'соль',
                    'count' => 5
                ]
            ]
        ];

        foreach ($compositions as $composition) {
            Compound::create([
                'composition' => json_encode($composition, JSON_UNESCAPED_UNICODE),
                'weight' => random_int(1, 50)
            ]);
        }
    }

}
