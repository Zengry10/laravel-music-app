<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use Inertia\Inertia;

class TrackController extends Controller
{
    public function getTracks () {
        $tracks = Track::all();
        return Inertia::render('Track/index', ['tracks' => $tracks]);
    }

    public function create () {
        return Inertia::render('Track/Create');

    }
}