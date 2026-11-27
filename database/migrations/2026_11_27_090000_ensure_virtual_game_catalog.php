<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('games')) return;

        $games = [
            ['name' => 'Lucky Spin', 'slug' => 'lucky-spin', 'category' => 'arcade', 'description' => 'عجلة ألوان ترفيهية بنقاط افتراضية فقط.'],
            ['name' => 'Treasure Tiles', 'slug' => 'treasure-tiles', 'category' => 'puzzle', 'description' => 'اكتشف المربعات وحل الألغاز.'],
            ['name' => 'Color Match', 'slug' => 'color-match', 'category' => 'puzzle', 'description' => 'طابق الألوان في تحدٍ سريع.'],
            ['name' => 'Memory Cards', 'slug' => 'memory-cards', 'category' => 'memory', 'description' => 'اختبر ذاكرتك بمطابقة البطاقات.'],
            ['name' => 'Number Puzzle', 'slug' => 'number-puzzle', 'category' => 'puzzle', 'description' => 'رتّب الأرقام للوصول إلى الحل.'],
            ['name' => 'Bubble Pop', 'slug' => 'bubble-pop', 'category' => 'arcade', 'description' => 'فرقع الفقاعات المتشابهة.'],
            ['name' => 'Block Builder', 'slug' => 'block-builder', 'category' => 'puzzle', 'description' => 'كوّن الصفوف ورتّب القطع.'],
            ['name' => 'Gem Match', 'slug' => 'gem-match', 'category' => 'puzzle', 'description' => 'اجمع الأحجار المتشابهة في لوحة الألغاز.'],
            ['name' => 'Maze Runner', 'slug' => 'maze-runner', 'category' => 'arcade', 'description' => 'اعثر على طريق الخروج من المتاهة.'],
            ['name' => 'Word Quest', 'slug' => 'word-quest', 'category' => 'word', 'description' => 'كوّن الكلمات من الحروف المتاحة.'],
            ['name' => 'Quick Tap', 'slug' => 'quick-tap', 'category' => 'arcade', 'description' => 'اختبر سرعة الاستجابة والنقر.'],
            ['name' => 'Color Wheel', 'slug' => 'color-wheel', 'category' => 'arcade', 'description' => 'دوّر عجلة الألوان كتجربة ترفيهية بلا رهانات.'],
            ['name' => 'Dice Practice', 'slug' => 'dice-practice', 'category' => 'dice', 'description' => 'تجربة نرد افتراضية للترفيه فقط.'],
            ['name' => 'Card Memory', 'slug' => 'card-memory', 'category' => 'memory', 'description' => 'تذكّر ترتيب البطاقات وأماكنها.'],
            ['name' => 'Sudoku Mini', 'slug' => 'sudoku-mini', 'category' => 'puzzle', 'description' => 'حل شبكة سودوكو صغيرة.'],
            ['name' => '2048 Mini', 'slug' => '2048-mini', 'category' => 'puzzle', 'description' => 'ادمج الأرقام للوصول إلى 2048.'],
            ['name' => 'Shape Shift', 'slug' => 'shape-shift', 'category' => 'puzzle', 'description' => 'طابق الأشكال مع أماكنها.'],
            ['name' => 'Fruit Catch', 'slug' => 'fruit-catch', 'category' => 'arcade', 'description' => 'التقط الفواكه وتجنب العوائق.'],
            ['name' => 'Sky Jump', 'slug' => 'sky-jump', 'category' => 'arcade', 'description' => 'اقفز بين المنصات وسجّل أفضل نتيجة.'],
            ['name' => 'Ocean Match', 'slug' => 'ocean-match', 'category' => 'puzzle', 'description' => 'طابق رموز البحر في جولات قصيرة.'],
            ['name' => 'Chess Trainer', 'slug' => 'chess-trainer', 'category' => 'strategy', 'description' => 'تدريبات شطرنج قصيرة للمبتدئين.'],
            ['name' => 'Checkers Mini', 'slug' => 'checkers-mini', 'category' => 'strategy', 'description' => 'العب جولات داماً سريعة.'],
            ['name' => 'Reaction Test', 'slug' => 'reaction-test', 'category' => 'arcade', 'description' => 'اختبر سرعة رد فعلك.'],
            ['name' => 'Pattern Recall', 'slug' => 'pattern-recall', 'category' => 'memory', 'description' => 'احفظ النمط ثم أعد تكوينه.'],
            ['name' => 'Pipe Connect', 'slug' => 'pipe-connect', 'category' => 'puzzle', 'description' => 'صل الأنابيب لتكوين مسار متصل.'],
            ['name' => 'Stack Tower', 'slug' => 'stack-tower', 'category' => 'arcade', 'description' => 'ابنِ برجاً متوازناً قطعة فوق قطعة.'],
            ['name' => 'Jigsaw Mini', 'slug' => 'jigsaw-mini', 'category' => 'puzzle', 'description' => 'أكمل صورة الأحجية.'],
            ['name' => 'Letter Mix', 'slug' => 'letter-mix', 'category' => 'word', 'description' => 'رتّب الحروف لتكوين كلمات صحيحة.'],
            ['name' => 'Find the Pair', 'slug' => 'find-the-pair', 'category' => 'memory', 'description' => 'اعثر على الأزواج المتطابقة.'],
            ['name' => 'Target Reflex', 'slug' => 'target-reflex', 'category' => 'arcade', 'description' => 'اختبر الدقة وسرعة الاستجابة.'],
        ];

        foreach ($games as $game) {
            DB::table('games')->updateOrInsert(
                ['slug' => $game['slug']],
                ['name' => $game['name'], 'category' => $game['category'], 'description' => $game['description'], 'is_active' => true, 'updated_at' => now(), 'created_at' => now()]
            );
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('games')) {
            DB::table('games')->whereIn('slug', ['lucky-spin', 'treasure-tiles', 'color-match', 'memory-cards', 'number-puzzle', 'bubble-pop', 'block-builder', 'gem-match', 'maze-runner', 'word-quest', 'quick-tap', 'color-wheel', 'dice-practice', 'card-memory', 'sudoku-mini', '2048-mini', 'shape-shift', 'fruit-catch', 'sky-jump', 'ocean-match', 'chess-trainer', 'checkers-mini', 'reaction-test', 'pattern-recall', 'pipe-connect', 'stack-tower', 'jigsaw-mini', 'letter-mix', 'find-the-pair', 'target-reflex'])->delete();
        }
    }
};
