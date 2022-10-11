<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    public $table = 'profil';

    protected $fillable = [
        'user_id',
        'nip',
        'jabatan',
        'jenis_kelamin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
