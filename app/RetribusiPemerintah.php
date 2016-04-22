<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RetribusiPemerintah extends Model
{
    use SoftDeletes;

    protected $table = 'retribusipemerintah';
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
        'tgl_lunas',
        'bulan',
        'tahun',
        'status_cek',
    );

    protected $SoftDelete = true;
    protected $dates = ['deleted_at'];
}
