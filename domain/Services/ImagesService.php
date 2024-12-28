<?php

namespace domain\Services;

use App\Models\Banner;
use App\Models\Image;
use GuzzleHttp\Psr7\Request;

class ImagesService
{
    protected $images;

    public function __construct(){
        $this->images = new Image();
    }

    public function store($file){
        $name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $name);

        return $this->images->create([
            'name' => $name,
        ]);
    }
}
