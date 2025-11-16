<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemInfo extends Model
{
    protected $fillable = [
        'system_name',
        'system_version',
        'database_type',
        'status'
    ];
}
