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
        // nev valtozasok itt is mint masik junctionben
        Schema::create('part_work_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_order_id');
            $table->unsignedBigInteger('part_id');
            $table->integer('quantity')->default(0); // Extra column
            $table->timestamps();

            $table->foreign('work_order_id')->references('id')->on('work_orders');
            $table->foreign('part_id')->references('id')->on('parts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('part_workorder');
    }
};
