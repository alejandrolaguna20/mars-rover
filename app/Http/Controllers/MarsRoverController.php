<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MarsRoverController extends Controller
{
    public function home()
    {
        return Inertia::render("Home");
    }
}
