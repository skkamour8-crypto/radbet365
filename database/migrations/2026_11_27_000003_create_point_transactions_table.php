<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('point_transactions', function (Blueprint $table) {
            $table->id(); $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('admin_id')->nullable()->constrained('users')->nullOnDelete();
            $table->bigInteger('amount'); $table->unsignedBigInteger('balance_after');
            $table->string('reason')->nullable(); $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('point_transactions'); }
};
