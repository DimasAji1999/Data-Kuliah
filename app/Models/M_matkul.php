<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_matkul extends Model
{
    protected $table = 'm_matkul';

    
    protected $fillable = ['siswa', 'matkul', 'sks', 'created_at', 'updated_at'];

    public function siswa_r(){
        return $this->belongsTo('App\Models\M_siswa','siswa','id');
    }
}
