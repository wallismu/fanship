<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

// use App\UserInfo;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userInfo() {
        return $this->hasOne('App\UserInfo');
    }


    public function fandomTags() {
        return $this->hasMany('App\FandomTag');
    }

    public function fandomTagIds() {
        return DB::table('fandom_tags')
            ->join('fandoms', 'fandom_tags.fandom_id', '=', 'fandoms.id')
            ->where('user_id', '=', $this->id)
            ->pluck('fandom_id')
            ->toArray();
    }

    public function fandomTagNames() {
        return DB::table('fandom_tags')
            ->join('fandoms', 'fandom_tags.fandom_id', '=', 'fandoms.id')
            ->where('user_id', '=', $this->id)
            ->pluck('name')
            ->toArray();
    }

    public function compareToUser(User $user) {
        $myTags = $this->fandomTagIds();

        $theirTags = $user->fandomTagIds();

        $diff = array_diff($myTags, $theirTags);

        // return $diff;

        return (count($myTags)-count($diff))/count($myTags);
    }
}
