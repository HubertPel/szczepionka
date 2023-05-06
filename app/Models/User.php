<?php

namespace App\Models;

use App\Models\Hospitals;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static function boot()
    {
        parent::boot();
    
        static::creating(function($model)
        {
            if ($model->password) {
                $model->password = password_hash($model->password, PASSWORD_DEFAULT );
            }
        });
    
        static::updating(function($model)
        {
            if ($model->password) {
                $model->password = password_hash($model->password, PASSWORD_DEFAULT );
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'pesel',
        'email',
        'email_verified_at',
        'birthdate',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hospitals()
    {
        return $this->belongsToMany(Hospitals::class, 'hospitals_workers', 'user_id', 'hospital_id');
    }
}
