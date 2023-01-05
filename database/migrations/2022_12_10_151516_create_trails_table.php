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
        Schema::create('trails', function (Blueprint $table) {
            $table->id();
            $table->uuid('trail_uuid');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('trail_name');
            $table->date('trail_start_date');
            $table->date('trail_end_date')->nullable();
            $table->longText('trail_about')->nullable();
            $table->string('trail_about_img_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('instagram_map_img_url')->nullable();
            $table->string('fitbit_url')->nullable();
            $table->string('lighter_pack_url')->nullable();
            $table->string('garmin_map_url')->nullable();
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
        Schema::dropIfExists('trails');
    }
};
