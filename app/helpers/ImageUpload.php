<?php

 namespace App\helpers;


 class ImageUpload{


    public static function upload($file , $path){

        $imgPath = $file->store($path);

        return $imgPath;
    }
 }