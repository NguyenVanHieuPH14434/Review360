<?php

namespace Database\Factories;

use App\Models\JobTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobTitle>
 */
class JobTitleFactory extends Factory
{
    protected static $id = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_title_code' => function() {
                $jobTitleCode = generateCode("JT", static::$id);
                static::$id++;
                return $jobTitleCode;
            },
            'title' => "Chức danh " . static::$id,
            'description' => fake()->text(),
            'status' => 1,
        ];
    }
}
