<?php

use App\Brand;
use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Type::class, 6)->create()->each(function (Type $type) {
            $type->brands()->createMany(
                factory(Brand::class, rand(5, 9))->raw()
            );
        });
    }
}
