<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
	protected $model = Order::class;


	public function definition()
	{
		return [
			'name'           => $this->faker->name(),
			'email'          => $this->faker->unique()->safeEmail(),
			'personal_phone' => $this->faker->randomNumber(9),
			'company_phone'  => $this->faker->randomNumber(9),
			'company'        => $this->faker->company,
			'position'       => $this->faker->jobTitle,
			'message'        => $this->faker->paragraph(3)
		];
	}
}
