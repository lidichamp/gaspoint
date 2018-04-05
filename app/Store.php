<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'agent_id','name','lat','lng','postal','address',
        'telephone','state','city','hours','hours2','hours3'
    ];

    public function agent(){
        return $this->hasMany('App\Agent', 'id', 'agent_id');
    }
    
}
