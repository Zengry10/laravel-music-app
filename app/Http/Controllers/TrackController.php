<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function createTrack(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:50'],
            'artist' => ['required', 'max:50'],
            'image' => ['required', 'image', 'max:2048'],
            'music' => ['required', 'file', 'max:2048'],
        ]);
    
        $imagePath = $request->file('image')->store('images');
        $musicPath = $request->file('music')->store('music');
    
        Track::create([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'image' => $imagePath,
            'music' => $musicPath,
        ]);
    
        $tracks = Track::all();
    
        // Include a success message in the response
        return Inertia::render('Track/index', [
            'tracks' => $tracks,
            'successMessage' => 'Musique correctement créée',
        ]);
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