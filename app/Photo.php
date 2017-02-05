<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'src', 'hotel_id', 'name', 'description'
    ];

    public function Hotel()
    {
        return $this->hasOne('App\Hotel', 'id', 'hotel_id');
    }

    protected $table = "images";

}
