<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Agenda extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'waktu',
        'tempat',
        'status',
    ];

    // Ubah menjadi relasi hasOne karena satu agenda punya satu notulen
    public function minute(): HasOne
    {
        return $this->hasOne(Minute::class);
    }
}