<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Storeagent extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id', 'fieldagent_id',
    ];


}
