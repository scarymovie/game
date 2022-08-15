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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('phone');
            $table->string('name')->after('id')->unique()->nullable();
            $table->integer('phone')->after('name')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
//            $table->dropColumn('name');
//            $table->dropColumn('phone');
            $table->string('name')->after('id')->unique()->nullable();
            $table->integer('phone')->after('name')->unique()->nullable();
//            $table->dropColumn('phone');
        });
    }
};
