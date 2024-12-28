<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title',
        'image_id',
        'status',
       ];

    public function Images(){
        return $this->hasOne(Image::class, 'id','image_id');
    }
}
