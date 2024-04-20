<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourrierController extends Controller
{
    public function create () {
        return view("pages.courrier.create-courrier");
    }
}
