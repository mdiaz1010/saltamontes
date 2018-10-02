<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin_type extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="coins_types";
    protected $fillable = [
        'id', 'name_coin', 'soles', 'dolares'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
