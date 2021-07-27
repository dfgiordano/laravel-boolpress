<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //creo una colonna, con valore anche nullo dopo la colonna id 
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            //creo la foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //devo prima cancellare la chiave esterna altrimenti o non riuscirò a cancellare la colonna
            $table->dropForeign('posts_category_id_foreign');

            $table->dropColumn('category_id');
        });
    }
}
