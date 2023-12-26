<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    protected $table = 'sales';
    protected $fillable = [
        'sale_date',
        'customer_id',
        'total_amount',
        'discount_percentage',
        'return_quantity',
        'status',
        'discount_amount',
        'created_by',

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function salesItem()
    {
        return $this->hasMany(SalesItem::class, 'sales_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
