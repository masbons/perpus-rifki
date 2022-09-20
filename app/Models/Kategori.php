<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
 protected $table = "kategoris";
 protected $primaryKey = "id";
 protected $fillable = ['id', 'nama'];

  public function book()
    {
      return $this->hasMany(book::class);
    } 
 }
