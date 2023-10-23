<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 0c7adc5da90b60b7df9d6efd0c9dd1a417551d1a

class Transaction extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
     use SoftDeletes;

    public $table = 'transaction';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // yang diperbolekan untuk diisi
    protected $fillable = [
        'appointment_id',
        'fee_doctor',
        'fee_specialist',
        'fee_hospital',
        'fee_total',
        'vat',
        'total',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
>>>>>>> 0c7adc5da90b60b7df9d6efd0c9dd1a417551d1a
}
