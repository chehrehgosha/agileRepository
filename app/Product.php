<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id','district_id','user_id','name', 'price', 'attributes', 'is_sold','description'];

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ad()
    {
        return $this->hasOne('App\Ad');
    }

    public function auctions()
    {
        return $this->hasMany('App\Auction');
    }

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}