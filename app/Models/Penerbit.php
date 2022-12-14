<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    protected $table = "penerbits";
    protected $primaryKey = "id";
    protected $fillable = ['nama', 'alamat', 'telepon', 'email'];

    public function book()
    {
        return $this->hasMany(book::class);
    }
}
