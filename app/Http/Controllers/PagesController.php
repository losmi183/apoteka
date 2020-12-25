<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function questions()
    {
        return view('pages.questions');
    }
    public function delivery()
    {
        return view('pages.delivery');
    }
    public function payment()
    {
        return view('pages.payment');
    }
}
