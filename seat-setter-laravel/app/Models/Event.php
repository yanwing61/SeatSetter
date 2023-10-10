<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = 'event_id';
    public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

    public function groups()
    {
        return $this->hasMany(Group::class, 'event_id'); 
    }

    public function tables()
    {
        return $this->hasMany(Table::class, 'table_id'); 
    }

    use HasFactory;
}
