<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            'Novel',
            'Komik',
            'Manga',
            'Cerita',
            'Biografi',
            'Sejarah',
            'Fiksi',
            'Horor',
            'Drama',
        ];

        foreach ($kategori as $key => $value) {
            Kategori::create([
                'name' => $value
            ]);
        }
    }
}
