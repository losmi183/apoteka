<?php

namespace Database\Seeders;

use App\Models\Images;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 51; $i++) { 
            Images::create([
                'name' => $i.'.jpg',
                'product_id' => $i
            ]);
        }

        Images::create([
            'name' => '2.jpg',
            'product_id' => 1
        ]);
        Images::create([
            'name' => '3.jpg',
            'product_id' => 1
        ]);
        Images::create([
            'name' => '4.jpg',
            'product_id' => 1
        ]);
        Images::create([
            'name' => '5.jpg',
            'product_id' => 1
        ]);
        Images::create([
            'name' => '6.jpg',
            'product_id' => 1
        ]);
        Images::create([
            'name' => '7.jpg',
            'product_id' => 1
        ]);
    }
}
