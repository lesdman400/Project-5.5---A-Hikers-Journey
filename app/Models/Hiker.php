<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiker extends Model
{
    use HasFactory;

    protected $fillable = [
        'hiker_trail_name',
        'hiker_about',
        'hiker_uuid',
        'profile_img_url',
    ];
    
    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'hiker_id',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
