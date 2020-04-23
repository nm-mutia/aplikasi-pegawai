<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'nama', 'jenis_kelamin', 'departemen', 'level', 'agama', 'kontak', 'email'
    ];
}
