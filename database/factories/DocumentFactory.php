<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
	protected $model = Document::class;

	public function definition()
	{
		return [
			'name'        => implode(' ', $this->faker->unique()->words(random_int(1, 3))),
			'description' => implode(' ', $this->faker->words(random_int(2, 4)))
		];
	}
}
