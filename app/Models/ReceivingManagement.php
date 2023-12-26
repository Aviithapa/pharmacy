<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivingManagement extends Model
{
    use HasFactory;
    use HasFilter;

    protected $table = 'receiving_management';
    protected $fillable = [
        'ref_number',
        'supplier_id',
        'received_date',
        'total_amount',
        'created_by',
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function stock()
    {
        return $this->hasMany(StockManagement::class, 'receiving_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
