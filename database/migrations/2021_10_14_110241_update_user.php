<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            // $table->date('birthday')->nullable();
            // $table->tinyInteger('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('phone')->nullable();
            $table->string('about')->nullable();
            $table->string('bio')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 Active | 0 Deactive'); 
            $table->float('review_avg')->nullable();
            // $table->string('insta_id')->nullable();
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
            $table->dropColumn('birthday');
            $table->dropColumn('gender');
            $table->dropColumn('phone');
            $table->dropColumn('insta');
        });
    }
}
