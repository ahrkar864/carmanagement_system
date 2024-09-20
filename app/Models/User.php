<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\Positions;
use App\Models\Departments;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable =
    [
         'title',
         'name',
         'email',
         'status',
         'password',
         'branch_id',
         'department_id',
         'position_id',
         'employee_number'
         
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = [
        'profile_photo_url',
    ];

    public function departments(){
        return $this->belongsTo(Departments::class,'department_id')->withDefault();
    }

    public function positions(){
        return $this->belongsTo(Positions::class,'position_id')->withDefault();
    }
    // public function roles(){
    //     return $this->belongsTo(Role::class,'roles')->withDefault();
    // }
    public function user_categories()
    {
        return $this->hasMany(UserCategory::class,'user_id','id');
    }

    public function user_branches()
    {
        return $this->hasMany(UserBranch::class,'user_id','id');
    }
    public function from_branches()
    {
        return $this->belongsTo(Branch::class,'from_branch_id')->withDefault();
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
