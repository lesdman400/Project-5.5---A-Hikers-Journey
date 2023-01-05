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
        Schema::create('trail_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trails_id')->constrained()->cascadeOnDelete();
            $table->date('hike_date');
            $table->enum('direction_type',['nobo','sobo','flipflop']);
            $table->integer('start_mile_marker');
            $table->string('start_location')->nullable();
            $table->integer('start_elevation');
            $table->string('end_location')->nullable();
            $table->integer('end_mile_marker');
            $table->integer('end_elevation');
            $table->enum('camp_type',['tent','shelter','building','hammock','cowboy']);
            $table->boolean('slackpacked')->nullable();
            $table->boolean('bed')->nullable();
            $table->boolean('shower')->nullable();
            $table->integer('mood_scale');
            $table->enum('blaze_type',['pink','yellow','blue','white','aqua']);
            $table->longText('trail_notes')->nullable();
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
        Schema::dropIfExists('trail_notes');
    }
};
