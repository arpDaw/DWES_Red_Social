<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Like::class;
    public function definition()
    {
        $user_id = User::all('id')->random()->id;
        $image_id = Image::all('id')->random()->id;
        return [
            'user_id'=> $user_id,
            'image_id'=>$image_id,
            'created_at'=>fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at'=>fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
