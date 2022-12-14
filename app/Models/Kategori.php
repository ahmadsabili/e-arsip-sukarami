<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = 'kategori';
    protected $fillable = ['nama'];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }
}
