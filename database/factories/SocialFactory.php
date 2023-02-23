<?php

namespace Database\Factories;

use App\Models\Social;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialFactory extends Factory
{
  
    protected $model = Social::class;

  
    public function definition()
    {
        return [
            'facebook'        => $this->faker->sentence(2),
            'twitter'        => $this->faker->sentence(4),
            'whatsapp'        => $this->faker->sentence(4),
            'instagram'        => $this->faker->sentence(4),
            'telegram'        => $this->faker->sentence(4),

            
			
			
	
        ];
    }
}
