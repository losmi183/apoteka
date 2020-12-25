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

        $x = 0;
        for ($i=1; $i <= 10; $i++) { 
            Product::create([
                'id' => $i,
                'slug' => 'proizvod-imunitet-'.$i,
                'category_id' => 1,
                'subcategory_id' => 6 + $x++,
                'ime' => 'Proizvod Imunitet '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'pakovanje' => '250 ml',
                'action_id' => '1',
                'znacka' => $x == 3  ? 'akcija' : '',
                'cena' => $price[array_rand($price)],
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => 'images/products/' . $i.'.jpg '
            ]);
            // Reset x after 3 cycles
            $x / 3 == 1 ? $x = 0 : '';
        }
        $x = 0;
        for ($i=11; $i <= 20; $i++) { 
            $product = Product::create([
                'id' => $i,
                'slug' => 'proizvod-za-bebe-'.$i,
                'category_id' => 2,                
                'subcategory_id' => 9 + $x++,
                'ime' => 'Proizvod za Bebe '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'pakovanje' => '250 ml',
                'action_id' => '2',
                'znacka' => $x == 3  ? 'akcija' : '',
                'cena' => $price[array_rand($price)],
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => 'images/products/' . $i.'.jpg '
            ]);
            $product->popust = $product->cena * 0.8;
            $product->save();
            // Reset x after 3 cycles
            $x / 3 == 1 ? $x = 0 : '';
        }
        $x = 0;
        for ($i=21; $i <= 30; $i++) { 
            $product = Product::create([
                'id' => $i,
                'slug' => 'proizvod-za-mrsavljenje-'.$i,
                'category_id' => 3,
                'subcategory_id' => 12 + $x++,
                'ime' => 'Proizvod za Mršavljenje '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'pakovanje' => '250 ml',                
                'action_id' => '3',
                'cena' => $price[array_rand($price)],
                'znacka' => $x == 3  ? 'novo' : '',
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => 'images/products/' . $i.'.jpg '
            ]);
            $product->popust = $product->cena * 0.8;
            $product->save();
            // Reset x after 3 cycles
            $x / 3 == 1 ? $x = 0 : '';
        }
        $x = 0;
        for ($i=31; $i <= 40; $i++) { 
            Product::create([
                'id' => $i,
                'slug' => 'proizvod-kozmetika-'.$i,
                'category_id' => 4,
                'subcategory_id' => 15 + $x++,
                'ime' => 'Proizvod Kozmetika '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'pakovanje' => '250 ml',
                'cena' => $price[array_rand($price)],
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => 'images/products/' . $i.'.jpg '
            ]);
            // Reset x after 3 cycles
            $x / 3 == 1 ? $x = 0 : '';
        }
        for ($i=41; $i <= 50; $i++) { 
            Product::create([
                'id' => $i,            
                'slug' => 'proizvod-potencija-'.$i,    
                'category_id' => 5,
                'subcategory_id' => 18 + $x++,
                'ime' => 'Proizvod Potencija '.$i,
                'proizvodjac' => 'Random Company'.$i,
                'pakovanje' => '250 ml',
                'cena' => $price[array_rand($price)],
                'opis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!',  
                'image' => 'images/products/' . $i.'.jpg '
            ]);
            // Reset x after 3 cycles
            $x / 3 == 1 ? $x = 0 : '';
        }
    }
}
