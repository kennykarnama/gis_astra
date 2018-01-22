<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    //
    protected $table = 'kota';

    protected $primaryKey = 'id_kota';

	public $timestamps = false;

    protected $fillable = [
        'nama_kota',
        'is_aktif'
    ];

    protected $guarded = [];
}
