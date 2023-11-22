<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;
    protected static $id = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'name' => "User " . static::$id,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' => Str::random(10),
            'role_id' => fake()->numberBetween(1, 4),
            'job_title_id' => fake()->numberBetween(1, 5),
            'department_id' => fake()->numberBetween(1, 5),
            'code' => function() {
                $code = generateCode("THOR", static::$id);
                static::$id++;
                return $code;
            },
            'direct_management' => 1,
            'work_start_date' => now(),
            'avatar' => defaultImage(),
            'status' => 1,
            'level' => fake()->numberBetween(1, 5),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
