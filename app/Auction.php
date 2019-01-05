<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'auctions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price', 'attributes', 'is_sold','description','base_price', 'start_time', 'end_time','highest_bid'];

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}