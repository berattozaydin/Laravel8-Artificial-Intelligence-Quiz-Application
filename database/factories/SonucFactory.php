<?php

namespace Database\Factories;

use App\Models\Cevap;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sonuc;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SonucFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=Sonuc::class;
    public function definition()
    {
        return [
            'user_id'=>rand(1,10),
            'quiz_id'=>rand(1,10),
            'puan'=>rand(1,100),
            'dogru'=>rand(1,20),
            'yanlis'=>rand(1,20)
        ];
    }
}
