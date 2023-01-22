<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_siswa extends Model
{
    protected $table = 'm_siswa';

    
    protected $fillable = ['nama', 'nim', 'no_telp', 'alamat', 'created_at', 'updated_at'];
}
