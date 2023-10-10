<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $primaryKey = 'group_id';

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    use HasFactory;
}
