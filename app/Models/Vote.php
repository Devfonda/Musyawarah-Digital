<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'setuju',
        'tidak_setuju',
        'user_id' // Pastikan kolom user_id ada
    ];

    public function total()
    {
        return $this->setuju + $this->tidak_setuju;
    }

    // Relasi ke user (pembuat voting)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}