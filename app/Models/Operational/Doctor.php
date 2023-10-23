<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Doctor extends Model
{
    use HasFactory;
=======
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
     use SoftDeletes;

    public $table = 'doctor';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // yang diperbolekan untuk diisi
    protected $fillable = [
        'specialist_id',
        'name',
        'fee',
        'photo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
>>>>>>> 0c7adc5da90b60b7df9d6efd0c9dd1a417551d1a
}
