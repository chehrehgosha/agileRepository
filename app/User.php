<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'finance', 'isAdmin', 'family','address'
    ];

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }

    public function charges()
    {
        return $this->hasMany('App\Charge');
    }

    public function auctions()
    {
        return $this->hasMany('App\Auction');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }


    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
