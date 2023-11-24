<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $date = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

     // many to many
    public function role()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Role');
    }

    // one to one
    public function detail_user()
    {
        return $this->hasOne('App\Models\ManagementAccess\DetailUser', 'user_id');
    }

    // one to many
    public function role_user()
    {
        return $this->hasMany('App\Models\ManagementAccess\RoleUser', 'user_id');
    }

    public function doctor()
    {
        return $this->hasOne('App\Models\Operational\Doctor', 'user_id');
    }

    public function appointment()
    {
        return $this->hasMany('App\Models\Operational\Appointment', 'user_id');
    }
}
