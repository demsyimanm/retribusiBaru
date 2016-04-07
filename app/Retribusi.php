<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retribusi extends Model
{
    use SoftDeletes;

    protected $table = 'retribusi';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = array(
        'pelangan_id',
        'bln_retribusi',
        'thn_retribusi',
        'kd_tarif',
        'retribusi',
        'tgl_lunas',
        'status_cek',
    );

    protected $SoftDelete = true;
    protected $dates = ['deleted_at'];

    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan');
    }
}
