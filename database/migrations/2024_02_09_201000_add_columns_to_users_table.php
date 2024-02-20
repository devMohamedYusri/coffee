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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('name');
            $table->string('last_name')->after('first_name');
            $table->string('phone')->after('last_name');
            $table->string('address')->after('password');
            $table->string('city')->after('address');
            $table->string('country')->after('city');
            $table->string('postal_code')->after('country');
            $table->string('avatar')->after('postal_code');
            $table->bigInteger('number_of_orders')->after('avatar');
            $table->bigInteger('number_of_bookings')->after('number_of_orders');
            $table->double('total_spent')->after('number_of_bookings');
            $table->double('points')->after('total_spent');
            $table->bigInteger('number_of_reviews')->after('points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
