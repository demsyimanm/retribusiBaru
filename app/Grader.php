<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Grader extends Model
{
    protected $table = 'grader';

    protected $fillable = array(
        'statusPemerintah',
        'statusSwasta'
    );

}
