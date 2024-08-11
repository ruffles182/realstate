<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'link', 'name', 'address', 'neighboorhood', 'map_link', 
        'agent_link', 'agent_name', 'agency_link', 'agency_name', 
        'date_listed', 'date_closed', 'date_contrated', 'date_pending', 
        'currency', 'market_price', 'status_id'
    ];

    public function getDaysFromCreatedAttribute()
    {
        return intval((now()->diffInDays($this->date_listed)) * -1);
    }

    public function statusChanges()
    {
        return $this->hasMany(StatusChange::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
