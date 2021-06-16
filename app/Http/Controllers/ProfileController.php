<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use App\Fandom;
use App\FandomTag;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    public function show(User $user) {
        //$userInfo = $user->getUserInfo();
        // $userInfo = UserInfo::find(1)->user;
        //dd($user->userInfo());
        //dd(UserInfo::find(1)->user);

        $userProfileInfo = UserInfo::with('user')->find($user->id);

        $userFandomTags = $user->fandomTags()->get();
        // $userFandomTags = FandomTag::with('user:id,name')->get();
        // dd($userFandomTags);


        // $tags = DB::table('user')
        //             ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //             ->join('orders', 'users.id', '=', 'orders.user_id')
        //             ->select('users.*', 'contacts.phone', 'orders.price')
        //             ->get();


        // $tags = $user->fandomTagIds();
        // dd($tags);
        $user2 = auth()->user();
        dd($user->compareToUser($user2));
       

//                     select fandom_tags.user_id, fandoms.id, fandoms.name
// from fandom_tags fandom_tag left join fandoms fandom on fandom_tag.fandom_id=fandom.id
        
        return view('profiles.show', compact(['user','userProfileInfo']));
    }
}
