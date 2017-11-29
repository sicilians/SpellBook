<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->string('name')->primary();
            /**
             * The casting stat of this class.
             */
            $table->string('stat');
            /**
             * An array of the spell names (strings) that a character that 
             * adopts this class could possibly learn.
             */
            $table->json('spells');
            /**
             * This column represents the minimum amount of spells a character 
             * that has adopted a particular class can know at any given level. 
             * As such, it is an array of 20 indices, and each index contains an
             * int that represents the minimum amount of spells known per level.
             */
            $table->json('minimum_spells_known_per_level');
            /**
             * Some classes can essentially buy more spells known, while others
             * can't. This column lets parts of the application known whether
             * a character that adopts a particular class can, in fact, do this.
             */
            $table->boolean('can_learn_spells');
            /**
             * An array of 20 indices, each one representing the class levels
             * accounted for in the core rule books. These indices contain their
             * own arrays. The aforementioned array's indices represent each
             * spell level that the class possesses at a particular class level. 
             * That array's values represents the number of spell slots given
             * to a class per spell level per class level. 
             */
            $table->json('spell_slots');
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
        Schema::dropIfExists('classes');
    }
}
