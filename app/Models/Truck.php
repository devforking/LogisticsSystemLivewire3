<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;


class Truck extends Model
{
    use HasFactory;

    protected $fillable = ['unit', 'image', 'driver_id'];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
