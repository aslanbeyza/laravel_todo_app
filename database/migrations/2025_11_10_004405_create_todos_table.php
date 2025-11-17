<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->enum('priority', ['low', 'medium', 'high'])->default('low');
            $table->date('due_date')->nullable(); // tamamlama tarihi olarak gösterilecek kişi giricek
            $table->dateTime('completed_at')->nullable(); // tamamlama tarihi olarak gösterilecek sistem tarafından otomatik olarak güncellenecek
            $table->softDeletes(); // silinme tarihi olarak gösterilecek
            $table->boolean('is_starred')->default(false); // önemli mi diye soruyoruz

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
