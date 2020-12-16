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
        $price = [1611, 905, 2122, 1411, 4585, 2155, 1998, 526, 348, 758, 902];

        for ($i=1; $i <= 10; $i++) { 
            Product::create([
                'id' => $i,
                'slug' => 'proizvod-imunitet-'.$i,
                'category_id' => 1,
                'subcategory_id' => 6,
                'ime' => 'Proizvod Imunitet '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'pakovanje' => '250 ml',
                'action_id' => '1',
                'cena' => 2500,
                'popust' => 1999,
                'cena' => $price[array_rand($price)],
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => $i.'.jpg '
            ]);
        }
        for ($i=11; $i <= 20; $i++) { 
            Product::create([
                'id' => $i,
                'slug' => 'proizvod-za-bebe-'.$i,
                'category_id' => 2,                
                'subcategory_id' => 7,
                'ime' => 'Proizvod za Bebe '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'pakovanje' => '250 ml',
                'action_id' => '2',
                'cena' => 1849,
                'popust' => 1499,
                'cena' => $price[array_rand($price)],
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => $i.'.jpg '
            ]);
        }
        for ($i=21; $i <= 30; $i++) { 
            Product::create([
                'id' => $i,
                'slug' => 'proizvod-za-mrsavljenje-'.$i,
                'category_id' => 3,
                'subcategory_id' => 8,
                'ime' => 'Proizvod za Mršavljenje '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'pakovanje' => '250 ml',                
                'action_id' => '3',
                'cena' => 1500,
                'popust' => 999,
                'cena' => $price[array_rand($price)],
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => $i.'.jpg '
            ]);
        }
        for ($i=31; $i <= 40; $i++) { 
            Product::create([
                'id' => $i,
                'slug' => 'proizvod-kozmetika-'.$i,
                'category_id' => 4,
                'subcategory_id' => 9,
                'ime' => 'Proizvod Kozmetika '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'pakovanje' => '250 ml',
                'cena' => $price[array_rand($price)],
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => $i.'.jpg '
            ]);
        }
        for ($i=41; $i <= 50; $i++) { 
            Product::create([
                'id' => $i,            
                'slug' => 'proizvod-potencija-'.$i,    
                'category_id' => 5,
                'subcategory_id' => 10,
                'ime' => 'Proizvod Potencija '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'pakovanje' => '250 ml',
                'cena' => $price[array_rand($price)],
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => $i.'.jpg '
            ]);
        }
    }
}
