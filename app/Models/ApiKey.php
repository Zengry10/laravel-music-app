<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApiKey extends Model
{

    protected $primaryKey = 'uuid';

    // Define the primary key type as string
    protected $keyType = 'string';

    // Disable auto-increment for the primary key
    public $incrementing = false;

    protected $fillable = [
        'name',
        'user_id',
        'key',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
    

    use HasFactory;
}


