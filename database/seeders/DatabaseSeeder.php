<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['name' => 'Lucky Spin', 'slug' => 'lucky-spin', 'category' => 'arcade', 'description' => 'لعبة حظ ترفيهية بنقاط افتراضية.'],
            ['name' => 'Treasure Tiles', 'slug' => 'treasure-tiles', 'category' => 'puzzle', 'description' => 'اكتشف المربعات واجمع النقاط الافتراضية.'],
            ['name' => 'Color Match', 'slug' => 'color-match', 'category' => 'puzzle', 'description' => 'طابق الألوان في تحدٍ سريع.'],
        ] as $game) { Game::query()->updateOrCreate(['slug' => $game['slug']], $game); }
    }
}
