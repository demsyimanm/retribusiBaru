<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tunggakan extends Model
{
    use SoftDeletes;

    protected $table = 'tunggakan';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = array(
        'pelangan_id',
        'periode_tagih',
        'status',
    );

    protected $SoftDelete = true;
    protected $dates = ['deleted_at'];

    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan');
    }
}
