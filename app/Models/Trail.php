<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trail extends Model
{
    use HasFactory;

    protected $fillable = [
        'trail_uuid',
        'user_id',
        'notes_id',
        'trail_name',
        'trail_start_date',
        'trail_end_date',
        'trail_about',
        'trail_about_img_url',
        'instagram_url',
        'instagram_map_img_url',
        'fitbit_url',
        'lighter_pack_url',
        'garmin_map_url',
    ];

    protected $hidden = [
        // 'fitbit_key',
        // 'instagram_key',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function trailnotes()
    // {
    //     return $this->hasMany(TrailNotes::class);
    // }
}
