<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusChange extends Model
{
    use HasFactory;
    protected $fillable = [
        'status_id', 'price', 'notes', 'property_id', 'currency'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
