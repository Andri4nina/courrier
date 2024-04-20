<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourrierController extends Controller
{
    public function index () {
        return view("pages.courrier.create-courrier");
    }

    public function create (Request $request) {
        return "Hello";
    }
}
