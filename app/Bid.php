<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bids';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['price','is_winner'];

    public function auction()
    {
        return $this->belongsTo('App\Auction');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}