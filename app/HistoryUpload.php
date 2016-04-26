<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryUpload extends Model
{
    use SoftDeletes;

    protected $table = 'historyupload';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = array(
        'keterangan',
        'tipe',
        'tgl_unggah',
        'bulan',
        'tahun'
    );

    protected $SoftDelete = true;
    protected $dates = ['deleted_at'];
}
