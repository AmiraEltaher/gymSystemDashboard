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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('photoCoach', 50);
            $table->string('nameCoach', 100);
            $table->integer('ageCoach');
            $table->text('addresCoach');
            $table->text('phoneCoach');
            $table->string('timeCoach');
            $table->text('shipCoach');
            $table->integer('salaryCoach');
            $table->text('QRCodeCoach');
            $table->string('freeCoach');
            // $table->foreignId('freeCoach')->constrained('weekdays');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
