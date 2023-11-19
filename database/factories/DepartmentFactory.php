<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
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
            'department_code' => function() {
                $departmentCode = generateCode("DT", static::$id);
                static::$id++;
                return $departmentCode;
            },
            'title' => "Phòng ban " . static::$id,
            'description' => fake()->text(),
            'status' => 1,
        ];
    }
}
