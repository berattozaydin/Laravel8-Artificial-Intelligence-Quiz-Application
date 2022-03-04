<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cevap;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CevapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=Cevap::class;
    public function definition()
    {
        return [
           'user_id'=>rand(1,10),
        'question_id'=>rand(1,100),
            'cevap'=>'a'
        ];
    }
}
