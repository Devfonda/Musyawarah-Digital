<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', // Added to allow mass assignment
        'tanggal',
        'waktu',
        'hadir'
    ];
    protected $casts = [
    'tanggal' => 'date',
    'waktu' => 'datetime:H:i:s', // Optional: if you want to format time
    ];

        public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Rest of the model code...
}