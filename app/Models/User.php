<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'country_id',
        'state_id',
        'city_id',
        'lga_id',
        'address',
        'gender',
        'role',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
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
     * The attributes that should be cast to native types.
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

    public function getRole(){
        return 'User';
    }

    public function getAvatar(){
        return '';
    }

    public function fullName(){
        return $this->name;
    }

    public function getStatus(){
        return 'Active';
    }

    public function country(){
        return $this->belongsTo(Country::class , "country_id");
    }

    public function state(){
        return $this->belongsTo(State::class , "state_id");
    }

    public function city(){
        return $this->belongsTo(City::class , "city_id");
    }

    public function kin(){
        return $this->hasOne(NextOfKin::class , "user_id");
    }

    public function company(){
        return $this->hasOne(Company::class , 'user_id');
    }

}
