<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockManagement extends Model
{
    use HasFactory;
    use HasFilter;

    protected $table = 'stock_management';
    protected $fillable = [
        'receiving_id',
        'medicine_id',
        'expiry_date',
        'mfg_date',
        'cost_price',
        'selling_price',
        'quantity',
        'addition',
        'price_per_unit',
        'total_price',
        'status',
        'remaining_quantity',
        'created_by',
    ];


    public function receiving()
    {
        return $this->belongsTo(ReceivingManagement::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
