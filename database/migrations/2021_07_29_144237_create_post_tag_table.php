<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            // $table->timestamps(); posso eliminarla,se non è necessario, così come posso fare con l'id se non mi servisse
            //aggiungo la prima colonna 
            $table->unsignedBigInteger('post_id');
            //aggiungo la foreign key stesso nome, poi references la colonna della tabella post alla quale puntare,on su quale tabella,onDelete comportamento da tenere se cancello
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('CASCADE');

            //replico la stessa cosa per l'altro,perchè avremo due chiavi esterne -> tabella "pivot in comune"
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('CASCADE');

            //lancio il comando php artisan migrate per creare la tabella ponte

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
