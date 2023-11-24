<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    protected $table = 'customer';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'description'
    ];

    public function sale()
    {
        return $this->belongsTo(Sales::class);
    }
}
