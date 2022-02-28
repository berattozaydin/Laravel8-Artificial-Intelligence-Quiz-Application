<?php

namespace Database\Factories;
use App\Models\Quiz;
use App\Models\Sorular;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SorularFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=Sorular::class;
    public function definition()
    {
        return [
            'quiz_id'=>rand(1,10),
            'question'=>$this->faker->sentence(rand(3,7)),
            'a'=>$this->faker->sentence(rand(1,3)),
            'b'=>$this->faker->sentence(rand(1,3)),
            'c'=>$this->faker->sentence(rand(1,3)),
            'd'=>$this->faker->sentence(rand(1,3)),
            'correctanswer'=>('a' || 'b' || 'c' || 'd')

        ];
    }
}
