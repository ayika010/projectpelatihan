<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    public $timestamps = true;

    protected $casts = [
        'total' => 'float'
    ];

    protected $fillable = [
        'nama',
        'deskripsi',
        'created_at',
        'jumlah',
        'total',
        'photo'
    ];
}
