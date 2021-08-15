<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use App\Fandom;
use App\FandomTag;
use DB;

class ProfileController extends Controller
{
    public function show(User $user) {
        $userProfileInfo = UserInfo::with('user')->find($user->id);

        $userFandomTags = User::find(1)->fandomTags;

        $fandoms = DB::table('fandoms')
                ->join('fandom_tags', 'fandoms.id', '=', 'fandom_tags.fandom_id')
                ->select('fandoms.name')
                ->where('fandom_tags.user_id', $user->id)
                ->get()
                ->all();
        
        return view('profiles.show', compact(['user','userProfileInfo','fandoms']));
    }
}
