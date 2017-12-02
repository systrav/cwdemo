<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    /**
        create attachement file
        @param contact_id 紐づけるContactテーブルのid
        @param file Illuminate\Http\UploadedFile (Request->{upload_file_name})
    */
    public static function saveFile($contact_id, $file){
        if(!empty($file) && $file->isValid()){
            $atc = new Attachment();
            $atc->contact_id = $contact_id;
            $atc->data = file_get_contents($file);
            $atc->mime_type = $file->getMimeType();
            $atc->save();
        }
    }
}
