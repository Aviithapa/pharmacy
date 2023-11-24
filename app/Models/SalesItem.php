<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesItem extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    protected $table = 'sales_items';
    protected $fillable = [
        'customer_id',
        'stock_id',
        'sales_id',
        'quantity',
        'amount',
        'total_amount',
        'discount_percentage',
        'return_quantity',
        'status'
    ];

    public function sale()
    {
        return $this->belongsTo(Sales::class);
    }

    public function stock()
    {
        return $this->belongsTo(StockManagement::class, 'stock_id', 'id');
    }
}
