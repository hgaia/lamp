<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventary extends Model
{
    use HasFactory;
    protected $table = "inventaries";
    protected $fillable = [

        'serial',
        'equipment',
        'quantity',
        'description',
        'local',
        'user_id',
        'is_disabled'

    ];
}
