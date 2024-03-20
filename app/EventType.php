<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    public $table = 'event_type';

    // public function cardsUpload()
    // {
    //     return $this->hasMany(CardsUpload::class, 'id_eventtype', 'id_eventtype');
    // }
}