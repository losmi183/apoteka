<?php

use Illuminate\Support\Facades\DB;

/*
* Custom Helper Functions
*/

function isActive($cat1, $cat2) 
{
    return $cat1 == $cat2 ? 'active' : '';
}

function allSubcategories()
{
    return DB::table('categories')->where('parent_id', '!=', 0)->get();
}

// Append query string to current route
function appendQuery($key, $value)
{
    // Create new query string: ?key=value
    $newQueries = [$key => $value];

    // A
    return request()->fullUrlWithQuery($newQueries);
}

// Formating helpers
function formatDate($time)
{
    return date('d-m-Y', strtotime($time));
}

function presentPrice($value)
{
    return $value / 100 . ' KM'; 
}