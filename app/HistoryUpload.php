<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'tahun',
        'status'
    );

    protected $SoftDelete = true;
    protected $dates = ['deleted_at'];
}
