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
        Schema::create('works', function (Blueprint $table) {
            $table->id();


            $table->string('title');                // عنوان العمل
            $table->text('description')->nullable();
            $table->string('category');             // القسم (قائمة ثابتة)
            $table->string('cover_image')->nullable();
            $table->string('info')->nullable();
            $table->text('results')->nullable();
            $table->text('tags')->nullable();       // Laravel, Vue, UI/UX


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
