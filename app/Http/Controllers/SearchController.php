<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class SearchController extends Controller
{
    public function show(Request $request) {
        $user = auth()->user();

        $userFandomTags = User::find($user->id)->fandomTags;

        $fandomsILike = [];
        foreach ($userFandomTags as $u) {
            $fandomsILike[] = $u->fandom_id;
        }

        $matches = [];
        foreach ($fandomsILike as $f) {
            $matches[] = DB::table('fandom_tags')->where('fandom_id', $f)->select('user_id')->get();
        }  

        dd($matches);

        return view('search');
    }
}
