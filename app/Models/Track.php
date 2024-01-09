<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'image',
        'music',
        'display',
        'play_count',
    ];

    // Specify that the primary key is a UUID
    protected $primaryKey = 'uuid';

    // Define the primary key type as string
    protected $keyType = 'string';

    // Disable auto-increment for the primary key
    public $incrementing = false;

    // Override boot method to generate UUID before creating a new record
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
