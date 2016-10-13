<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgCarouselToPostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('imgC1');
            $table->string('imgC2');
            $table->string('imgC3');
            $table->string('imgC4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('imgC1');
            $table->dropColumn('imgC2');
            $table->dropColumn('imgC3');
            $table->dropColumn('imgC4');
        });
    }

}
