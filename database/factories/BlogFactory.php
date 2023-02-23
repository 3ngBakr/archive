<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\blog;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id'  => $this->faker->randomElements([null, 1, 2, 3, 4, 5])[0],
	        'title'        => $this->faker->sentence(2),
	        'content'        => $this->faker->sentence(4),
	        'type'        => $this->faker->sentence(4),
           
        ];
    }
}
