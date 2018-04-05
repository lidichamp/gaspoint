<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'agent_id','others','address',
        'phone','quantity'
    ];

    public function agent(){
        return $this->hasMany('App\Agent', 'id', 'agent_id');
    }
    
}
