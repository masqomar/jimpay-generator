<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamanDetail extends Model
{
    use HasFactory;

    protected $table = 'tbl_pinjaman_d';
    /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
   protected $fillable = ['tgl_bayar', 'pinjam_id', 'angsuran_ke', 'jumlah_bayar', 'denda_rp', 'terlambat', 'ket_bayar'];

   /**
    * The attributes that should be cast.
    *
    * @var string[]
    */
   protected $casts = ['tgl_bayar' => 'datetime:d/m/Y H:i','angsuran_ke' => 'integer','jumlah_bayar' => 'integer','denda_rp' => 'integer','ket_bayar' => 'string','created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
   
   public function pinjaman()
   {
       return $this->belongsTo(\App\Models\Pinjaman::class, 'pinjam_id', 'id');
   }	
}
