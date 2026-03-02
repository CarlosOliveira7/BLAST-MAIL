<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscriber>
 */
class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email_list_id' => \App\Models\EmailList::factory(), // Cria uma lista automaticamente se não for passada uma
            'name' => fake()->name,
            'email' => fake()->unique()->safeEmail,
        ];
    }
}
