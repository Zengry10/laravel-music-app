<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{

    public function createTrack () {
        return Inertia::render('Track/Create');
    }
    
    public function getTracks () {
        $tracks = Track::all();
        return Inertia::render('Track/index', ['tracks' => $tracks]);
    }

    public function getTrackDetails($id)
    {
        $track = Track::find($id);
        // Ajoutez un log pour voir si la fonction est appelée
        return Inertia::render('Track/DetailsTrack', ['track' => $track]);
    }


}