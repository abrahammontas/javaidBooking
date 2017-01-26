<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'zip_code', 'city_id', 'state_id', 'rating', 'email', 'phone', 'check_in', 'check_out', 'early_check_in',
        'late_check_in', 'description'
    ];

    public function State()
    {
        return $this->hasOne('App\State', 'id', 'state_id');
    }

    public function City()
    {
        return $this->hasOne('App\City', 'id', 'city_id');
    }


}
