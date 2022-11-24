<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipmentLog extends Model
{
    use HasFactory;
    protected $table = "equipment_logs";
    protected $fillable = [

        'user_id',
        'equipment_id'
        
    ];
}
