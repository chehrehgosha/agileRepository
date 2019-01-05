<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'charges';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['verification_code', 'amount', 'is_verified'];

    public function user()
    {
        return $this->belongsTo('App\user');
    }

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}