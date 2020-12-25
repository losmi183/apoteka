<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Order 1
        $order = Order::create([
            'status' => 'primljena',
            'ime' => 'Milos Glogovac',
            'email' => 'glogovac@gmail.com',
            'adresa' => 'Kneza Mihajla 65',
            'telefon' => '333666',
            'grad' => 'Pančevo',
            'napomene' => 'da napomenem hitno mi je da stigne sto pre',
        ]);

        $products = Product::inRandomOrder()->take(4)->get();

        $sum = 0;

        foreach($products as $product) 
        {   
            $sum += $product->cena;

            OrderProduct::create([
                'product_id' => $product->id,
                'order_id' => $order->id,
                'quantity' => 1
            ]);
        }

        $order->suma = $sum;
        $order->save();
    
        // Order 1
        $order = Order::create([
            'status' => 'isporucena',
            'ime' => 'Kristina Vasic',
            'email' => 'krisss@gmail.com',
            'adresa' => 'Kneza Mihajla 65',
            'telefon' => '555333',
            'grad' => 'Pančevo',
            'napomene' => 'odlican kvalitet osvezenja',
        ]);

        $products = Product::inRandomOrder()->take(4)->get();

        $sum = 0;

        foreach ($products as $product) {
            $sum += $product->cena;

            OrderProduct::create([
                'product_id' => $product->id,
                'order_id' => $order->id,
                'quantity' => 1
            ]);
        }

        $order->suma = $sum;
        $order->save();
        {
            // Order 2
            $order = Order::create([
            'status' => 'primljena',
            'ime' => 'Vlado Prodanovic',
            'email' => 'prodanovic@gmail.com',
            'adresa' => 'JNA 1',
            'telefon' => '333666',
            'grad' => 'Zvornik',
            'napomene' => 'samo testiramo dal sve radi',
        ]);

            $products = Product::inRandomOrder()->take(4)->get();

            $sum = 0;

            foreach ($products as $product) {
                $sum += $product->cena;

                OrderProduct::create([
                'product_id' => $product->id,
                'order_id' => $order->id,
                'quantity' => 1
            ]);
            }

            $order->suma = $sum;
            $order->save();
        }
    }
}
