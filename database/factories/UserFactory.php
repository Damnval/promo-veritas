<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $full_name = $this->faker->name;

        return [
            'email' => $this->faker->unique()->safeEmail,
            'full_name' => $full_name,
            'slug_full_name' => Str::slug($full_name, '-'),
        ];
    }
}
