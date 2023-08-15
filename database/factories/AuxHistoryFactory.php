<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AuxHistory;
use App\Models\User;
use Faker\Generator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuxHistory>
 */
class AuxHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AuxHistory::class;

    protected $enums = ['Time In', 'Time Out', 'First 15 Mins', 'Second 15 Mins', 'Meeting Time In', 'Meeting Time Out', 'Coaching', 'BIO Break', 'Huddle', 'Wellness', 'Moderation'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'   => User::all()->random()->id,
            'type_aux'  => $this->faker->randomElement($this->enums),
            'created_by'    => '1',
            'modified_by'   => '1',
        ];
    }
}