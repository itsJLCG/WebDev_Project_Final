<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
    $role = $this->faker->randomElement(['user', 'Admin']); // Randomly select user or admin role

    // Convert role to lowercase if it's 'user'
    if ($role === 'user') {
        $role = strtolower($role);
    }

    return [
        'name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('password'), // Hashed password
        'remember_token' => Str::random(10),
        'user_image' => 'defaultprofile_male.jpg', // Default image name
        'role' => $role,
        'accountStatus' => 'Activated', // Assuming account is initially active
    ];
}


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
