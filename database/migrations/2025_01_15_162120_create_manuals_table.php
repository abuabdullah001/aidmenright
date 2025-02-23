<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manuals', function (Blueprint $table) {
            $table->id();
            // 'name','phone','email','address','payment_methood','transaction_info','payment_prrof','event_type';
            $table->string('name')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('payment_method')->default(1);
            $table->string('transaction_info')->nullable();
            $table->string('payment_proof')->nullable();
            $table->string('event_type')->default(1);
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
        Schema::dropIfExists('manuals');
    }
}
