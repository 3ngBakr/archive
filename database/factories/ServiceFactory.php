<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
	protected $model = Service::class;

	public function definition()
	{
		return [
			'name'        => $this->faker->sentence(2),
			'description' => $this->faker->sentence(4),
			'service_id'  => $this->faker->randomElements([null, 1, 2, 3, 4, 5])[0],
		];
	}
}
