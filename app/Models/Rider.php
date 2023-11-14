<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
    ];

    public function locations()
    {
        return $this->hasMany(RiderLocation::class);
    }
}
