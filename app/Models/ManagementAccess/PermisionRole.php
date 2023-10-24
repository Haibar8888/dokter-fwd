<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermisionRole extends Model
{
     use SoftDeletes;

    public $table = 'permision_role';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // yang diperbolekan untuk diisi
    protected $fillable = [
        'permision_id',
        'role_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function role () {
        return $this->belongsTo('app\Models\ManagementAccess\Role.php', 'role_id','id');
    }

    public function permision () {
        return $this->belongsTo('app\Models\ManagementAccess\Permision','permision_id','id');
    }
}
