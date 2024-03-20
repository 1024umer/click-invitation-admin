<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardsUpload extends Model
{
    // protected $with = ['eventType'];

    public $table = 'cards_upload';
    // public function eventType()
    // {
    //     return $this->belongsTo(EventType::class, 'id_eventtype', 'id_eventtype');
    // }
    public $timestamps = false;
}
