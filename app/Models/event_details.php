<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_details extends Model
{
    use HasFactory;
    protected $table = 'event_details';
    protected $fillable = [
        'project_name',
        'date_event',
        'start_time_plan',
        'finish_time_plan',
    ];
}
