<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrailNotes extends Model
{
    use HasFactory;

    protected $fillable = [
        'trails_id',
        'hike_date',
        'direction_type',
        'start_mile_marker',
        'start_location',
        'start_elevation',
        'end_location',
        'end_mile_marker',
        'end_elevation',
        'camp_type',
        'slackpacked',
        'bed',
        'shower',
        'mood_scale',
        'blaze_type',
        'trail_notes',
    ];

    public function user() { 
        return $this->trails->belongsTo(User::class);
    }

    public function trails()
    {
        return $this->belongsTo(Trail::class);
    }
}
