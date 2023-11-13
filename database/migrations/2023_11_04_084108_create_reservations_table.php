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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservation_id');
            $table->string('name',45);
            $table->string('note',45);
            $table->string('status',45)->default('pending');
            $table->unsignedBigInteger('customer_id');
            $table->integer('number_of_guests');
            $table->unsignedBigInteger('table_id');
            $table->date('reservation_date');
            $table->integer('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
