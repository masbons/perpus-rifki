<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    protected $tabel = "writers";
    protected $primaryKey = "id";
    protected $fillable = ['nama', 'alamat', 'no_telepon', 'email'];

    public function book()
    {
        return $this->hasMany(book::class);
    }

}

