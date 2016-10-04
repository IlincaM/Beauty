<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function getIndex() {
        return view ('pages.welcome');
    }
    public function getAboutMe() {
        return view ('pages.aboutMe');
    }
}
