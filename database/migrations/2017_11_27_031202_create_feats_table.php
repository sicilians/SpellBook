<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * As of right now, this table only represents DC-increasing feats.
 */
class CreateFeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('dc_increase');
            $table->text('description');
            /**
             * Boolean that tells parts of the application whether this feat was
             * user made or not.
             */
            $table->boolean('custom');
            /**
             * If this feat was user made, this represents the ID of the user 
             * who made it. Otherwise it'd be null.
             */
            $table->integer('creator_id');
            /**
             * Users can share feats to other users to allow them to easily 
             * incorporate them to their own characters. This column is an array 
             * of user IDs that have indeed added this custom feat to their own 
             * characters.
             */
            $table->json('follower_ids');
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
        Schema::dropIfExists('feats');
    }
}
