<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40)->nullable();
            $table->unsignedInteger('property_type_id');
            $table->unsignedInteger('location_id');
            $table->decimal('discount', 5, 2)->default(0);
            $table->integer('total_rating')->default(0);
            $table->integer('review')->default(0);
            $table->decimal('rating', 28, 8)->default(0);
            $table->text('description')->nullable();
            $table->text('map_url')->nullable();
            $table->string('image', 40)->nullable();
            $table->text('gallery_image')->nullable();
            $table->string('phone', 40)->nullable();
            $table->string('phone_call_time', 255)->nullable();
            $table->text('extra_features')->nullable();
            $table->tinyInteger('star')->default(0);
            $table->tinyInteger('top_reviewed')->default(0);
            $table->integer('all_time_booked_counter')->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('properties');
    }
}
