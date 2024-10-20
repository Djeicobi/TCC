<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function photos(){

        //Para indicar que um evento pode ter muitas fotos
        return $this->hasMany(Photo::class, 'event_id');

    }
    protected $guarded = [];

}
