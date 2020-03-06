<?php

use App\Brand;
use App\Type;
use Faker\Generator;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $types = Type::all();
        $brands = Brand::all();
        $brands->each(function (Brand $b) {
            $q = rand(0, 100);
            $b->bills()->create([
                'typeId' => $b->typeId,
                'brandId' => $b->brandId,
                'price' => $b->price,
                'quantity' => $q,
                'value' => $q * $b->price
            ]);
        });
    }
}
