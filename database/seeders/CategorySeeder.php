<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Акыда',
            'slug' => Str::slug( mb_substr('Акыда', 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-'),
            'published' => 1
        ]);
        Category::create([
            'title' => 'Фикх',
            'slug' => Str::slug( mb_substr('Фикх', 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-'),
            'published' => 1
        ]);
        Category::create([
            'title' => 'Хадис',
            'slug' => Str::slug( mb_substr('Хадис', 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-'),
            'published' => 1
        ]);
        Category::create([
            'title' => 'История',
            'slug' => Str::slug( mb_substr('История', 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-'),
            'published' => 1
        ]);
        Category::create([
            'title' => 'Адаб',
            'slug' => Str::slug( mb_substr('Адаб', 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-'),
            'published' => 1
        ]);
    }
}
