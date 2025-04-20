<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MarsRoverController extends Controller
{
    public function home()
    {
        $props;

        $props["name"] = Auth::user()->name;

        return Inertia::render("Home", $props);
    }
}
