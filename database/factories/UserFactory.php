<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        return [
            'name' => 'Admin',
            'email' => 'e.khrystenko1991@gmail.com',
            'email_verified_at' => now(),
            'is_admin' => true,
            'avatar' => $this->faker->image,
            'password' => Hash::make('12345678'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
