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
        // at lett irva a nev user_workorder ről
        Schema::create('user_work_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('work_order_id'); // itt is
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('work_order_id')->references('id')->on('work_orders'); // itt is
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_workorder');
    }
};
