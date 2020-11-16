<?php

use Illuminate\Support\Facades\DB;

/*
* Custom Helper Functions
*/

function dostupno($bool)
{   
    return $bool ? 'Na Stanju' : 'Nedostupno';
}

function isActive($cat1, $cat2) 
{
    return $cat1 == $cat2 ? 'active' : '';
}

function allSubcategories()
{
    return DB::table('categories')->where('parent_id', '!=', 0)->get();
}