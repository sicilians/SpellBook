<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Metamagic are a type of feat that can add additionakl effects to spells, but
 * said spells often have to take a higher spell slot.
 */
class CreateMetamagicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metamagic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            /**
             * The increase to the spell's spell level tied to the metamagic in
             * question.
             */
            $table->integer('level_modifier');
            $table->text('description');
            /**
             * Boolean that tells parts of the application whether this 
             * metamagic feat was user made or not.
             */
            $table->boolean('custom');
            /**
             * If this metamagic feat was user made, this represents the ID of 
             * the user who made it. Otherwise it'd be null.
             */
            $table->integer('creator_id');
            /**
             * Users can share metamagic feats to other users to allow them to 
             * easily incorporate them to their own characters. This column 
             * is an array of user IDs that have indeed added this custom 
             * metamagic feat to their own characters.
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
        Schema::dropIfExists('metamagic');
    }
}
