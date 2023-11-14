<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'rider_id',
        'service_name',
        'lat',
        'long',
        'capture_time',
    ];

    public function rider()
    {
        return $this->belongsTo(Rider::class);
    }
}
