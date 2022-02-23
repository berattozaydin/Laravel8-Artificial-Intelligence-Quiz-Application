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
            'answer1'=>$this->faker->sentence(rand(1,3)),
            'answer2'=>$this->faker->sentence(rand(1,3)),
            'answer3'=>$this->faker->sentence(rand(1,3)),
            'answer4'=>$this->faker->sentence(rand(1,3)),
            'correctanswer'=>'answer'.rand(1,4)

        ];
    }
}
