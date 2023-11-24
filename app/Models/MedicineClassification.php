<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineClassification extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    protected $table = 'medicine_classification';
    protected $fillable = [
        'name',
        'description',
        'created_by',
        'type',
        'slug',
        'label',
        'icon',
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
