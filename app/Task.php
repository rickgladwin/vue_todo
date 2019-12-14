<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'complete',
        'notes',
        'status_id',
        'target_completion_date'
    ];

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

}
