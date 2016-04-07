<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan_Baru extends Model
{
    use SoftDeletes;

    protected $table = 'pelanggan_baru';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = array(
        'nama',
        'jalan',
        'gang',
        'nomor',
        'notamb',
        'da',
        'kd_tarif',
        'rp_retribusi',
        'retribusi',
        'listrik',
        'lbr_jalan',
        'kategori',
        'status_aktif'
    );

    protected $SoftDelete = true;
    protected $dates = ['deleted_at'];
}
