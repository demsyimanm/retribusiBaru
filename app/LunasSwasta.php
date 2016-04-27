<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LunasSwasta extends Model
{

    protected $table = 'lunasswasta';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = array(
        'pelanggan_id',
        'nama',
        'jalan',
        'gang',
        'nomor',
        'notamb',
        'da',
        'kd_tarif',
        'retribusi',
        'listrik',
        'lbr_jalan',
        'periode_tagih',
        'ketstatus',
        'tgl_lunas',
        'bulan',
        'tahun',
    );

}
