<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str; //ricordarsi di importare questo per poter fare lo slug

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++) {
            
            //definisco nuova istanza
            $newPost = new Post();

            //genero i miei dati
            $newPost->title = "Titolo del post" .$i;
            $newPost->post = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla, soluta veritatis. Eos nobis qui optio molestiae. Temporibus labore accusantium suscipit?";
            $newPost->slug = Str::slug($newPost->title, '-');

            //salvo i dati nel db
            $newPost->save();
        }
    }
}
