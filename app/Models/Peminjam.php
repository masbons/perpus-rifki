<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

 protected $fillable = ['nama', 'id_buku', 'id_anggota', 'tanggal_pinjam', 'tanggal_kembali', 'denda', 'status'];
}
