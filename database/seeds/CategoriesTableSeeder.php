<?php

use Illuminate\Database\Seeder;
use App\Category; //importo category per poterlo usare
use Illuminate\Support\Str; //importo str per creare lo slug

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "Basket",
            "Calcio",
            "Tennis",
            "Pallavolo"
        ];

        foreach ($categories as $category){
            //creo una nuova istanza
            $newCategory = new Category;
            //valoizzo le proprietà
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($newCategory->name, '-');
            //salvo
            $newCategory->save();
        }
    }
}
