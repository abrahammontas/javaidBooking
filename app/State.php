<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city_id'
    ];

    public function City()
    {
        return $this->hasOne('App\City', 'id', 'city_id');
    }

}
