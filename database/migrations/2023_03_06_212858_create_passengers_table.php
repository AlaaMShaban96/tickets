<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained();
            $table->string('name');
            $table->string('last_name');
            $table->enum('gender', ["male","female"]);
            $table->string('nationality');
            $table->string('place_of_birth');
            $table->date('birth_date');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('passport_number', 25);
            $table->date('passport_expiry_date');
            $table->string('passport_photo');
            $table->string('visa_photo')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passengers');
    }
};
