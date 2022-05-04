<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    protected $fillable = [
        'datetime',
        'description',

    ];


    protected $dates = [
        'datetime',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url', 'formatted_date'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/schedules/'.$this->getKey());
    }

    public function getFormattedDateAttribute(){
        return \Carbon\Carbon::parse($this->datetime)->format('H:i');
    }
}
