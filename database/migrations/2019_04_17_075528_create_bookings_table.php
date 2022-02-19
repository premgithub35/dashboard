<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('mobile');
            $table->string('address');
            $table->decimal('amount')->nullable();
            $table->timestamp('delivery_date');
            $table->string('timeslot');
            $table->unsignedTinyInteger('service_item_id');
            $table->unsignedTinyInteger('booking_status');
            $table->unsignedTinyInteger('captain_id')->nullable();
            $table->unsignedTinyInteger('vendor_id')->nullable();
            $table->unsignedTinyInteger('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
