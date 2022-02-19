<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedTinyInteger('service_id');
            $table->json('items');
           
            $table->string('timeslot')->nullable()->change();
            $table->dateTime('delivery_date')->nullable()->change();
            $table->unsignedTinyInteger('payment_status');
            $table->double('advance_payment')->nullable();
            
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            
            
        });
    }
}
