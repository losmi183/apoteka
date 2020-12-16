<?php

namespace Database\Seeders;

use App\Models\Action;
use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Action::create([
            'name' => 'Botanic Proizvodi 20% popusta',
            'slug' => 'botanic-akcija',
            'discount' => 20,
            'active' => 1,
            'image' => 'images/actions/botanic-akcija.jpg'
        ]);
        Action::create([
            'name' => 'Biofar 10% popusta',
            'slug' => 'biofar-akcija',
            'discount' => 10,
            'active' => 1,
            'image' => 'images/actions/biofar-akcija.jpg'
        ]);
        Action::create([
            'name' => 'Ekomer 10% popusta',
            'slug' => 'ekomer-akcija',
            'discount' => 10,
            'active' => 1,
            'image' => 'images/actions/ekomer-akcija.jpg'
        ]);
        Action::create([
            'name' => 'Istekla Akcija 10% popusta',
            'slug' => 'ekomer-istekla',
            'discount' => 10,
            'active' => 0,
            'image' => 'images/actions/ekomer-istekla.jpg'
        ]);
    }
}
