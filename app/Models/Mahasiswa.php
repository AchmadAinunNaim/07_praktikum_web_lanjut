<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable; 
use Illuminate\Notifications\Notifiable; 
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table="mahasiswas";

    public $timestamps= false; 
    protected $primaryKey = 'nim';
    
    protected $fillable = [ 
        'Nim', 
        'Nama', 
        'Kelas', 
        'Jurusan', 
        'No_Handphone', 
        'Email' => 'required',
        'Tanggal_Lahir' => 'required',
    ];
}
