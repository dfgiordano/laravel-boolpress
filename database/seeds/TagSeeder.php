<?php

use Illuminate\Database\Seeder;
use App\Tag;
use illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creo un array con i miei tag 
        $tags = [
            "Squadra",
            "Nazionali",
            "Campionato",
            "Risultati",
            "Mercato"
        ];
        foreach($tags as $tag) {
            //creo una nuova istanza, use App\Tag
            $newTag = new Tag();
            //valorizzo le proprietà della singola entità
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag,'-');
            //salvo a db i miei dati
            $newTag->save();
        }
    }
}
