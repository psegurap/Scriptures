<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 100)->nullable();
            $table->string('img_thumbnail', 100);
            $table->string('attach_reference', 100);
            $table->boolean('developer')->default(0);
            $table->boolean('admin')->default(0);
            $table->boolean('filter')->default(0);
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
            $table->dropColumn('phone');
            $table->dropColumn('img_thumbnail');
            $table->dropColumn('attach_reference');
            $table->dropColumn('developer');
            $table->dropColumn('admin');
            $table->dropColumn('filter');
        });
    }
}
