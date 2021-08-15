<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class BrowseController extends Controller
{
    public function show() {
        $user = auth()->user();
        $allOtherUsers = User::where('id', '!=', auth()->user()->id)->get();

        $matches = $user->getMatchesByProximity($allOtherUsers);

        // dd($matches);

        return view('browse.show', compact(['matches']));
    }
}
