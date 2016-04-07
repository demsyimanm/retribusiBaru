<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use SoftDeletes;

    protected $table = 'pelanggan';
    protected $primaryKey = 'id';
    public $timestamps = true;

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

    public function difference()
    {
        return $this->hasMany('App\Difference');
    }

    public function retribusi()
    {
        return $this->hasMany('App\Retribusi');
    }

    public function tunggakan()
    {
        return $this->hasMany('App\Tunggakan');
    }
}
