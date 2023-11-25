<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    protected $table = 'medicine';
    protected $fillable = [
        'name',
        'generic_name',
        'sku',
        'description',
        'measurement',
        'prescription_required',
        'type_id',
        'category_id',
        'created_by',
    ];

    public function type()
    {
        return $this->belongsTo(MedicineClassification::class);
    }

    public function category()
    {
        return $this->belongsTo(MedicineClassification::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function stock()
    {
        return $this->hasMany(StockManagement::class, 'medicine_id', 'id');
    }
}
