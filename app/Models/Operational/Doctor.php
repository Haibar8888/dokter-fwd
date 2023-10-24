<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function specialist () {
        return $this->belongsTo('app\Models\MasterData\Specialist','specialist_id','id');
    }

    public function appointment() {
        return $this->hasMany('app\Models\Operational\Appointment','doctor_id');
    }
}
