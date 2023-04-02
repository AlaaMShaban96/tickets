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

        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('plane_id')->constrained();
            $table->foreignId('from_airport_id')->constrained('airports');
            $table->foreignId('to_airport_id')->constrained('airports');
            $table->time('take_off_at');
            $table->time('landing_at');
            $table->double('adults_price');
            $table->double('tax')->nullable();
            $table->double('children_price')->nullable();
            $table->text('poilcy')->nullable();
            $table->boolean('need_visa');
            $table->boolean('available')->nullable()->default(true);
            $table->time('check_in')->nullable();
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
        Schema::dropIfExists('trips');
    }
};
