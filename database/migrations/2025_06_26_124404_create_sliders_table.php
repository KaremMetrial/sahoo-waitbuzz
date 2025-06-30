<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('sliders', function (Blueprint $table) {
                $table->id();
                $table->enum('type', ['home1', 'home2']);
                $table->string('btn_link');
                $table->boolean('active')->default(true);
                $table->timestamps();

                $table->index(['active', 'type']);
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('sliders');
        }
    };
