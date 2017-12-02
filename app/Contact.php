<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        "firstname","lastname","firstname_kana","lastname_kana",
        "birth_date","gender","telno_1","telno_2","telno_3","memo_1",
        "attachment_id_1","attachment_id_2",
        "title","body"
    ]; 
}
