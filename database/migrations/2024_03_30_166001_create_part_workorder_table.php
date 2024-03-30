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
        Schema::create('part_workorder', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('part_id');
            $table->unsignedBigInteger('workorder_id');
            $table->timestamps();

            $table->foreign('part_id')->references('id')->on('parts');
            $table->foreign('workorder_id')->references('id')->on('work_orders');
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
