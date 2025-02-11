<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['start_date', 'end_date', 'event_name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
