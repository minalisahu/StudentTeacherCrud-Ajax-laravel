<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

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
            'description' => $this->faker->text(),
            'phone' => $this->faker->unique()->phone,
            'image'=>'',
            'create_at'=>now(),
             'updated_at'=>now()
        ];
    }
}
