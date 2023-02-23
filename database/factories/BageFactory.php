<?php

namespace Database\Factories;

use App\Models\Bage;
use Illuminate\Database\Eloquent\Factories\Factory;

class BageFactory extends Factory
{
  
    protected $model = Bage::class;

  
    public function definition()
    {
        return [
            'name'        => $this->faker->sentence(2),
            'description'        => $this->faker->sentence(4),
            'vision'        => $this->faker->sentence(4),
            'message'        => $this->faker->sentence(4),
            'objective'        => $this->faker->sentence(4),

            
			
			
	
        ];
    }
}
