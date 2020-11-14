<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10; $i++) { 
            Product::create([
                'id' => $i,
                'category_id' => 1,
                'ime' => 'Proizvod Imunitet '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'akcija' => 'popust',
                'pakovanje' => '250 ml',
                'cena' => 29,
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => $i.'.jpg '
            ]);
        }
        for ($i=11; $i <= 20; $i++) { 
            Product::create([
                'id' => $i,
                'category_id' => 2,
                'ime' => 'Proizvod za Bebe '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'akcija' => 'popust',
                'pakovanje' => '250 ml',
                'cena' => 29,
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => $i.'.jpg '
            ]);
        }
        for ($i=21; $i <= 30; $i++) { 
            Product::create([
                'id' => $i,
                'category_id' => 3,
                'ime' => 'Proizvod za Mršavljenje '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'akcija' => 'popust',
                'pakovanje' => '250 ml',
                'cena' => 29,
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => $i.'.jpg '
            ]);
        }
        for ($i=31; $i <= 40; $i++) { 
            Product::create([
                'id' => $i,
                'category_id' => 4,
                'ime' => 'Proizvod Kozmetika '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'akcija' => 'popust',
                'pakovanje' => '250 ml',
                'cena' => 29,
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => $i.'.jpg '
            ]);
        }
        for ($i=41; $i <= 50; $i++) { 
            Product::create([
                'id' => $i,                
                'category_id' => 5,
                'ime' => 'Proizvod Potencija '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'akcija' => 'popust',
                'pakovanje' => '250 ml',
                'cena' => 29,
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => $i.'.jpg '
            ]);
        }
    }
}
