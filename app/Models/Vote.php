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
        'user_id',
        'status' // Tambahkan status
    ];

    public function total()
    {
        return $this->setuju + $this->tidak_setuju;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Method untuk mengecek apakah voting sudah selesai
    public function isCompleted()
    {
        return $this->status === 'completed';
    }
}