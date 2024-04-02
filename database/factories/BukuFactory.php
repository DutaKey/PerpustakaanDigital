<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Buku;
use App\Models\Kategori;

class BukuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Buku::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->words(3, true),
            'kategori_id' => Kategori::factory(),
            'penulis' => $this->faker->name(),
            'penerbit' => $this->faker->name(),
            'tahun_terbit' => $this->faker->year(),
            'stok' => $this->faker->numberBetween(10, 100),
        ];
    }
}
