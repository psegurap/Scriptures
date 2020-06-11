<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_es', 300)->nullable();
            $table->string('title_en', 300)->nullable();
            $table->string('short_description_es', 300)->nullable();
            $table->string('short_description_en', 300)->nullable();
            $table->text('full_content_es')->nullable();
            $table->text('full_content_en')->nullable();
            $table->string('img_thumbnail', 300);
            $table->string('url_es', 400)->nullable();
            $table->string('url_en', 400)->nullable();
            $table->string('attach_reference', 100);
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
