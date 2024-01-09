<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'company_name',
        'company_type',
        'phone_number',
        'address',
        'email',
        'user_id',
        'company_registration_number'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
