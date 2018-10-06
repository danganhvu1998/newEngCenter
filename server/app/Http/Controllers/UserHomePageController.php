<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomePageController extends Controller
{
    //
    public function showingSite(){
        return view("userPage.home");
    }

    public function showingTestSite(){
        return view("userPage.test");
    }
}
