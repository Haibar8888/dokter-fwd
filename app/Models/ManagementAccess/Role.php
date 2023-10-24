<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
     use SoftDeletes;

    public $table = 'role';

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

    public function role_user () {
        return $this->hasMany('app\Models\ManagementAccess\RoleUser.php','role_id');
    }

    public function permision_role () {
        return $this->hasMany('app\Models\ManagementAccess\PermisionRole.php','role_id');
    }
}
