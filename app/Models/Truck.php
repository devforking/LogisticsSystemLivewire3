<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Truck extends Model
{
    use HasFactory;

    protected $fillable = ['unit', 'image', 'user_id'];
    public function driver()
    {
        // Ensure 'user_id' is the correct foreign key
        return $this->belongsTo(User::class, 'user_id');
    }
}
