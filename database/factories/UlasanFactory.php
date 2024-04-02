<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Buku;
use App\Models\Ulasan;
use App\Models\User;

class UlasanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ulasan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'buku_id' => Buku::factory(),
            'user_id' => User::factory(),
            'ulasan' => $this->faker->text(),
            'rating' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
