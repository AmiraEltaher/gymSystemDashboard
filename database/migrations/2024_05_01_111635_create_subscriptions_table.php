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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('player_id');
            $table->string('subtype');
            $table->string('offers_id')->nullable();
            $table->integer('basic_amount');
            $table->integer('basic_paid');
            $table->integer('basic_rest');
            $table->string('start_subscription');
            $table->string('end_subscription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};