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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true);
            $table->string('code')->unique()->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();

            $table->foreignId('category_id')->constrained()->cascadeOnDelete();

            $table->index(['active', 'is_featured', 'category_id', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
