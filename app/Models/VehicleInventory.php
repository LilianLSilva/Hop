<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleInventory extends Model
{
    use HasFactory;

    protected $table ='inv_vehicle';

    protected $fillable = [
        'vehicle_id',
        'name',
        'count',
    ];

    protected $hidden = ['updated_at', 'created_at'];

}
