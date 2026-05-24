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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('sub_category')->nullable();
            $table->integer('min_quantity')->default(0);
            $table->integer('max_quantity')->default(0);

            $table->decimal('weight', 8, 2)->nullable();
            $table->string('weight_unit', 10)->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->string('height_unit', 10)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->string('length_unit', 10)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->string('width_unit', 10)->nullable();

            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
