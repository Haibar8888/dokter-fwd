<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model{

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

    public function appointments() {
        return $this->belongsTo('app\Models\Operational\Appointment','appointment_id','id');
    }
}
