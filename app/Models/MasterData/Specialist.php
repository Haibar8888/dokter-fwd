<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialist extends Model
{
<<<<<<< HEAD
    use HasFactory;
    
=======
     use SoftDeletes;

    public $table = 'specialist';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // yang diperbolekan untuk diisi
    protected $fillable = [
        'name',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
>>>>>>> 0c7adc5da90b60b7df9d6efd0c9dd1a417551d1a
}
