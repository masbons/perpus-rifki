<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $primaryKey ="id";
    protected $fillable = [
        'nama', 'tahun_terbit', 'id_penulis', 'id_penerbit', 'id_kategori', 'sinopsis', 'image'
    ];

    public function writer()
    { 
        return $this->belongsTo(writer::class, 'id_penulis', 'id');
    }
     public function penerbit()
    { 
        return $this->belongsTo(penerbit::class, 'id_penerbit', 'id');
    }
     public function kategori()
    { 
        return $this->belongsTo(kategori::class, 'id_kategori', 'id');
    }
}
