<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spells', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            /**
             * An associative array that contains the name of the classes that
             * can cast said spell as keys and the spell's spell level as the
             * values.
             */
            $table->json('classes');
            $table->json('spell_data');
            /**
             * Boolean that tells parts of the application whether this spell
             * was user made or not.
             */
            $table->boolean('custom');
            /**
             * If this spell was user made, this represents the ID of the user
             * who made it. Otherwise it'd be null.
             */
            $table->integer('creator_id');
            /**
             * Users can share spells to other users to allow them to easily 
             * incorporate them into their own spell books. This column is an 
             * array of user IDs that have indeed added this custom spell to
             * their own spell books.
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
        Schema::dropIfExists('spells');
    }
}
