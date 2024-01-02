<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Medias extends Model
{
    use HasFactory;
    use SoftDeletes;


    const TYPE_LOGO = 'LOGO';
    const TYPE_COMPANY_DOCUMENTS = 'COMPANY_DOCUMENTS';
    const TYPE_OTHER = 'OTHER';


    const TYPES = [
        self::TYPE_LOGO,
        self::TYPE_COMPANY_DOCUMENTS,
        self::TYPE_OTHER,
    ];

    protected $table = 'medias';
    protected $appends = ['url'];

    protected $fillable = [
        'name',
        'original_name',
        'mime_type',
        'path',
        'collection',
        'disk',
        'patient_id',
        'medical_record_id',
        'type'
    ];

    public function getUrlAttribute()
    {
        return $this->disk === 'local' ? Storage::disk('public')->url($this->path) : config('services.minio.minio_public_endpoint') . '/' . $this->path;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function receivingManagement(): BelongsTo
    {
        return $this->belongsTo(ReceivingManagement::class);
    }
}
