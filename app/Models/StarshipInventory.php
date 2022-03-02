<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StarshipInventory extends Model
{
    use HasFactory;

    protected $table ='inv_starship';

    protected $fillable = [
        'starship_id',
        'name',
        'count',
    ];

    protected $hidden = ['updated_at', 'created_at'];

}
