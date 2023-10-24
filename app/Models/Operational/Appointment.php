<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    public $table = 'appointment';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // yang diperbolekan untuk diisi
    protected $fillable = [
        'user_id',
        'doctor_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function doctor () {
        return $this->belongsTo('app\Models\Operational\Doctor','doctor_id','id');
    }

    public function transaction () {
        return $this->hasOne('app\Models\Operational\Transaction','appointment_id');
    }

    public function consultation () {
        return $this->belongsTo('app\Models\MasterData\Consultation','consultation_id','id');
    }

    public function user () {
        return $this->belongsTo('app\Models\User','user_id','id');
    }

}
