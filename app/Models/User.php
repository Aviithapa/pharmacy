<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'userId',
        'imei',
        'password',
        'phone_number',
        'remember_token',
        'token',
        'position',
        'reference',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function medicineClassification()
    {
        return $this->belongsToMany(MedicineClassification::class);
    }

    public function receivingManagement()
    {
        return $this->belongsToMany(ReceivingManagement::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sales::class);
    }

    public function salesItem()
    {
        return $this->belongsToMany(salesItem::class);
    }

    public function stockManagement()
    {
        return $this->belongsToMany(StockManagement::class);
    }

    public function supplier()
    {
        return $this->belongsToMany(Supplier::class);
    }

    /**
     * Displays the single role of user from many-many relationship
     * @return mixed
     */
    public function mainRole()
    {
        return self::join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('roles.*')
            ->where('users.id', $this->id)->first();
    }

    public function isAdmin()
    {
        return self::join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('roles.*')
            ->where('users.id', $this->id)->first(); // Assuming 'admin' is the admin role
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function active()
    {
        if ($this->status === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(Medias::class, 'user_id', 'id');
    }
}
