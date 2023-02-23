<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
  
    protected $model = Program::class;

  
    public function definition()
    {
        return [
            'name'        => $this->faker->sentence(2),
			'program_id'  => $this->faker->randomElements([null, 1, 2, 3, 4, 5])[0],
	
        ];
    }
}
