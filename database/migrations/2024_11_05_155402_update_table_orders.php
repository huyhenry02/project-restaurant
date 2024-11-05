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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['table_id']);
            $table->dropForeign(['table_type_id']);
            $table->dropColumn(['table_id']);
            $table->dropColumn(['table_type_id']);
            $table->dropColumn(['time']);
            $table->integer('total_amount')->change();
            $table->unsignedBigInteger('reservation_id')->after('customer_id');
            $table->foreign('reservation_id')->references('reservation_id')->on('reservations')->onDelete('cascade');
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->integer('total')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('table_id')->after('customer_id');
            $table->unsignedBigInteger('table_type_id')->after('table_id');
            $table->integer('time');
            $table->float('total_amount')->change();
            $table->dropColumn(['reservation_id']);
            $table->dropForeign(['reservation_id']);
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->float('total')->change();
        });
    }
};
