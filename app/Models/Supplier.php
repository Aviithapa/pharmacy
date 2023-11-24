<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    protected $fillable = [
        'name',
        'contact_name',
        'email',
        'phone',
        'address',
        'pan_number'
    ];
}
