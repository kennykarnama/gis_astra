<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //
    protected $table = 'peminjaman';

    protected $primaryKey = 'id_peminjaman';

	public $timestamps = false;

    protected $fillable = [
        'no_agreement',
        'nama_peminjam',
        'id_arho',
        'id_kota',
        'id_kecamatan',
        'id_kelurahan',
        'alamat',
        'kode_pos',
        'tgl_jatuh_tempo',
        'jumlah_angsuran',
        'nilai_angsuran',
        'saldo',
        'is_aktif'
    ];

    protected $guarded = [];
}
