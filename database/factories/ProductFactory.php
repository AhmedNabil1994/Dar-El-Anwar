<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {

        $name = fake()->name;
        $sku = fake()->sentence;
        $description = fake()->sentence;
        $parcode = fake()->sentence;
        $price = fake()->randomNumber(2);
        $department_id = fake()->numberBetween(1, 20);
        $meta_description = fake()->sentence;
        $unit = 'متر (م)';
        $slug = fake()->slug;
        $tags = fake()->sentence;
        $canonical = fake()->sentence;
        $quantity = fake()->numberBetween(1, 1000);
        $user_id = 1;

        return [
            'sku' => $sku,
            'description' => $description,
            'parcode' => $parcode,
            'name' => $name,
            'price' => $price,
            'department_id' => $department_id,
            'meta_description' => $meta_description,
            'unit' => $unit,
            'slug' => $slug,
            'tags' => $tags,
            'canonical' => $canonical,
            'quantity' => $quantity,
            'user_id' => $user_id,
        ];
    }
}
