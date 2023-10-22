<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Permision extends Model
{
     use SoftDeletes;

    public $table = 'permision';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // yang diperbolekan untuk diisi
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
