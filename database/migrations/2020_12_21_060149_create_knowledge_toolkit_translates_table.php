<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgeToolkitTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledge_toolkit_translates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ntkit_id');
            $table->string('lang_key',5)->nullable();
            $table->longText('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('thumb_image',191)->nullable();
            $table->string('cover_image',191)->nullable();
            $table->string('audio',191)->nullable();
            $table->string('video',191)->nullable();
            $table->string('files',191)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ntkit_id')->references('id')->on('knowledge_toolkits')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('knowledge_toolkit_translates');
    }
}
