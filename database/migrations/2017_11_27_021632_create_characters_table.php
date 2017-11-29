<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 70);
            /** 
             * An associative array that contains the list of classes this 
             * character possesses as keys and the level (ints) tied to each of 
             * those classes as values.
             */
            $table->json('classes');
            /** 
             * An associative array that contains the list of casting stats this 
             * character possesses as keys and the numerical value tied to each 
             * of those stats as values.
             */
            $table->json('stats');
            /**
             * An associative array that contains an array of two values as its 
             * value. The first value of said array is itself an associative 
             * array that uses feat names as keys for its own associative array. 
             * The value of the feat associative array can either be null or it 
             * can contain an associative array that uses schools as keys and 
             * has an array of spell school names (strings) as values. The 
             * second value of the dc_modifiers array is an int that's meant to 
             * represent the DC increase tied to the feat.
             */
            $table->json('dc_modifiers');
            /**
             * This column represents the spells known by the character out of
             * the possible spell pool tied to its class. This is just an array
             * of the spell names (strings) that the character knows.
             */
            $table->json('spells_known');
            /**
             * This column represents the spells actually chosen and prepared 
             * for the adventuring day among the list of spells known by the 
             * character. The various choices a character can make in preparing 
             * their spells for the day is represented by an array that has two 
             * values. The first value is an associative array that has the 
             * spell names as its keys and either null or another associative 
             * array as its value. This associative array has the string 
             * "metamagics" as its key and has an array of strings that indeed 
             * contain all the metamagics tied to the spell in question as its 
             * values. The second value of the top-level array is the spell's 
             * DC (int). Spontaneous spellcasters will generally have this value 
             * set to null since they don't prepare spells. 
             */
            $table->json('spells_prepared');
            /**
             * The ID of the user that created this character.
             */
            $table->integer('user_id');
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
        Schema::dropIfExists('characters');
    }
}
