<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'inputsurat';
    protected $guarded = [];
    // protected $fillable = ['NoSurat','BulanTahun','Menimbang','Dasar','Untuk','KabKota','Provinsi','TanggalTugas'];
}
