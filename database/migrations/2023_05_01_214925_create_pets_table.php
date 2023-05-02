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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            
            $table->string('name', 100);
            $table->char('breed', 30);
            $table->char('color', 30);
            $table->string('size');
            $table->integer('visits')->default(0);

            $table->string("owner", 100);
            $table->string('phone', 20);
            $table->string('email', 150);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
