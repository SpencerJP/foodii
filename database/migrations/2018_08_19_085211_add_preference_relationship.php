<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreferenceRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->integer('preference_id')->nullable();
            $table->foreign('preference_id')->references('id')->on('preferences');
        });

        Schema::table('preferences', function($table) {
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('preference_id');
        });

        Schema::table('preferences', function($table) {
            $table->dropColumn('user_id');
        });
    }
}
