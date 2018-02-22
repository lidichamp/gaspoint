<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'street_address','city','state','postal_code','country', 'lat','lng'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  
}
