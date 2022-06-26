<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class event_details extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'event_details';
    protected $fillable = [
        'project_name',
        'date_event',
        'start_time_plan',
        'finish_time_plan',
        'start_wakatime',
        'finish_wakatime',
    ];
}
