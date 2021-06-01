<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'first_name' => $this->faker->firstName(),
        'last_name' => $this->faker->lastName(),
        'subject' => $this->faker->sentence(5),
        'email' => $this->faker->unique()->safeEmail(),
        'phone' => $this->faker->unique()->phone,
        'image'=>'',
        'teacher_id'=>'',
        'create_at'=>now(),
        'updated_at'=>now()

        ];


    }
}
