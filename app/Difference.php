<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Difference extends Model
{
    use SoftDeletes;

    protected $table = 'difference';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = array(
        'retribusi_id',
        'pelanggan_id',
        'keterangan',
        'alamat'
    );

    protected $SoftDelete = true;
    protected $dates = ['deleted_at'];

    public function retribusi()
    {
        return $this->belongsTo('App\Retribusi');
    }

    public function pelangan()
    {
        return $this->belongsTo('App\Pelanggan');
    }
}
