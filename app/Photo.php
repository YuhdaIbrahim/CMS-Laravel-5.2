<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file'];

    protected $dir = '/images/';

    public function getFileAttribute($photo){
        return $this->dir . $photo;
    }
}
