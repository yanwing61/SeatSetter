<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $primaryKey = 'table_id';
    protected $table = 'tables';
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    use HasFactory;
}
