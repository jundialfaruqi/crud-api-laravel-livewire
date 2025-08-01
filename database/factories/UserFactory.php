<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama = fake()->name();
        $username = str()->slug($nama, '_');
        $email = $username . '@' . $this->faker->randomElement(['mail.com', 'gmail.com']);
        return [
            'name' => $nama,
            'username' => $username,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'status_user' => $this->faker->randomElement(['aktif', 'tidak aktif', 'diblokir']),
            'remember_token' => Str::random(10),
        ];

        // versi original
        // return [
        //     'name' => fake()->name(),
        //     'username' => fake()->unique()->username(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'phone' => $this->faker->phoneNumber(),
        //     'address' => $this->faker->address(),
        //     'status_user' => $this->faker->randomElement(['aktif', 'tidak aktif', 'diblokir']),
        //     'remember_token' => Str::random(10),
        // ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
