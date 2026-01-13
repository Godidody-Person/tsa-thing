<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{

    protected $fillable = [
        'name',
        'description',
        'type',
        'image_path',
        'creator_id',
    ];

    public function creator(){
        return $this->belongsTo(User::class);
    }

    public static function resources(){
        return self::take(15)->get();
    }

    public static function events(){
        return self::where('type', 'event')->take(15)->get();
    }

    public static function nonprofits(){
        return self::where('type', 'nonprofit')->take(15)->get();
    }

    public static function programs(){
        return self::where('type', 'program')->take(15)->get();
    }

    public static function clubs(){
        return self::where('type', 'club')->take(15)->get();
    }
}

